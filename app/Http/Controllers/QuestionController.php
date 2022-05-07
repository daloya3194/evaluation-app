<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class QuestionController extends Controller
{
    public function question($question_number)
    {
        $question = Question::with(['cluster'])->where('slug', 'question-' . $question_number)->first();
        session()->put('start_time', microtime(true));

        return view('question-' . $question_number, [
            'question' => $question,
            'images' => $this->getShuffleImages(),
        ]);
    }

    public function question_submit(Request $request)
    {
        $true = $this->saveResponse($request);

        if ($true) {
            return [
                'response' => true,
                'url' => $request->get('next_question') < 7 ? route('question', $request->get('next_question')) : route('question-next-step', $request->get('next_question'))
            ];
        } else {
            return [
                'response' => false,
            ];
        }

    }

    public function question_next_step($question_number)
    {
        $question = Question::with(['cluster'])->where('slug', 'question-' . $question_number)->first();
        $images = $this->getImagesPerCluster();
        session()->put('start_time', microtime(true));

        return view('question-' . $question_number, [
            'question' => $question,
            'cluster_1' => $images['cluster_1'],
            'cluster_2' => $images['cluster_2'],
            'cluster_3' => $images['cluster_3'],
        ]);
    }

    private function saveResponse($request)
    {
        $end_time = microtime(true);
        $question = Question::with(['cluster'])->find($request->get('question_id'));

        $response = Response::where(['question_id' => $request->get('question_id'), 'participant_id' => $request->get('participant_id')])->first();

        if ($question->image_id == $request->get('image_id') && session()->has('participant')) {
            if (isset($response)) {
                $response->update([
                    'question_id' => $request->get('question_id'),
                    'participant_id' => $request->get('participant_id'),
                    'image_id' => $request->get('image_id'),
                    'time' => date('H:i:s', $end_time - session('start_time')),
                    'true' => $question->image_id == $request->get('image_id'),
                ]);
            } else {
                \App\Models\Response::create([
                    'question_id' => $request->get('question_id'),
                    'participant_id' => $request->get('participant_id'),
                    'image_id' => $request->get('image_id'),
                    'time' => date('H:i:s', $end_time - session('start_time')),
                    'true' => $question->image_id == $request->get('image_id'),
                ]);
            }

            return true;
        }
        return false;
    }

    private function getShuffleImages()
    {
        //Activer ou desactiver le melange de l'image
//        return Image::all();
        return Image::all()->shuffle();
    }

    private function getImagesPerCluster()
    {
        $cluster_1 = Image::inRandomOrder()->where('cluster_id', 1)->get();
        $cluster_2 = Image::inRandomOrder()->where('cluster_id', 2)->get();
        $cluster_3 = Image::inRandomOrder()->where('cluster_id', 3)->get();

        return [
            'cluster_1' => $cluster_1,
            'cluster_2' => $cluster_2,
            'cluster_3' => $cluster_3,
        ];
    }
}
