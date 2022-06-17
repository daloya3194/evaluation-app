<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question($question_number)
    {
        $question = Question::with(['cluster'])->where('slug', 'question-' . $question_number)->first();
        $response_image = Image::find($question->image_id);
        $images_to_shuffle = Image::all()->shuffle();

        $images = $this->getImageWithTheCorrectPosition($images_to_shuffle, $response_image);

        session()->put('image_position', $images->search($response_image));
        session()->put('start_time', microtime(true));

        return view('question-' . $question_number, [
            'question' => $question,
            'images' => $images,
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
        $response_image = Image::find($question->image_id);

        $cluster_1 = Image::where('cluster_id', 1)->get()->shuffle();
        $cluster_2 = Image::where('cluster_id', 2)->get()->shuffle();
        $cluster_3 = Image::where('cluster_id', 3)->get()->shuffle();

        if ($response_image->cluster_id == 1) {
            $cluster_1 = $this->getImageWithTheCorrectPosition($cluster_1, $response_image);
            session()->put('image_position', $cluster_1->search($response_image));
        }

        if ($response_image->cluster_id == 2) {
            $cluster_2 = $this->getImageWithTheCorrectPosition($cluster_2, $response_image);
            session()->put('image_position', $cluster_2->search($response_image));
        }

        if ($response_image->cluster_id == 3) {
            $cluster_3 = $this->getImageWithTheCorrectPosition($cluster_3, $response_image);
            session()->put('image_position', $cluster_3->search($response_image));
        }

        session()->put('start_time', microtime(true));

        return view('question-' . $question_number, [
            'question' => $question,
            'cluster_1' => $cluster_1,
            'cluster_2' => $cluster_2,
            'cluster_3' => $cluster_3,
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
                    'image_position' => session('image_position'),
                ]);
            } else {
                \App\Models\Response::create([
                    'question_id' => $request->get('question_id'),
                    'participant_id' => $request->get('participant_id'),
                    'image_id' => $request->get('image_id'),
                    'time' => date('H:i:s', $end_time - session('start_time')),
                    'true' => $question->image_id == $request->get('image_id'),
                    'image_position' => session('image_position'),
                ]);
            }

            return true;
        }
        return false;
    }

    private function getImageWithTheCorrectPosition($images_to_shuffle, $response_image)
    {
        $loop = true;
        do {
            $images = $images_to_shuffle->shuffle();
            if ($images->search($response_image) > 12) {
                $loop = false;
            }
        }while($loop);

        return $images;
    }

}
