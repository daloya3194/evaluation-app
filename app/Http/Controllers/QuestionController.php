<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class QuestionController extends Controller
{
    public function question_1()
    {
        $question = Question::with(['cluster'])->where('slug', 'question-1')->first();
//        $images_collection = $this->getImage(31, 1, 32, 32, 4);
        session()->put('start_time', microtime(true));
//        session()->put('images_set_question_');

        return view('question-1', [
            'question' => $question,
            'images' => $this->getShuffleImages(),
        ]);
    }

/*    public function question_1_submit(Request $request)
    {
        $true = $this->saveResponse($request);

        if ($true) {
            return [
                'response' => true,
                'url' => route('question-1')
            ];
        } else {
            return [
                'response' => false,
            ];
        }

    }*/

    public function question_2()
    {
        $question = Question::with(['cluster'])->where('slug', 'question-2')->first();
        $images_collection = $this->getImage(31, 32, 32, 1, 4);
        session()->put('start_time', microtime(true));

        return view('question-2', [
            'question' => $question,
            'images' => $images_collection->shuffle(),
        ]);
    }

/*    public function question_2_submit(Request $request)
    {
        $this->saveResponse($request);

        return redirect(route('question-3'));
    }*/

    public function question_3()
    {
        $question = Question::with(['cluster'])->where('slug', 'question-3')->first();
        $images_collection = $this->getImage(31, 1, 32, 32, 4);
        session()->put('start_time', microtime(true));

        return view('question-3', [
            'question' => $question,
            'images' => $images_collection->shuffle(),
        ]);
    }

/*    public function question_3_submit(Request $request)
    {
        $this->saveResponse($request);

        return redirect(route('question-4'));
    }*/

    public function question_4()
    {
        $question = Question::with(['cluster'])->where('slug', 'question-4')->first();
        $images_collection = $this->getImage(1, 31, 32, 32, 4);
        session()->put('start_time', microtime(true));

        return view('question-4', [
            'question' => $question,
            'images' => $images_collection->shuffle(),
        ]);
    }

/*    public function question_4_submit(Request $request)
    {
        $this->saveResponse($request);

        return redirect(route('question-5'));
    }*/

    public function question_5()
    {
        $question = Question::with(['cluster'])->where('slug', 'question-5')->first();
        $images_collection = $this->getImage(24, 25, 25, 25, 1);
        session()->put('start_time', microtime(true));

        return view('question-5', [
            'question' => $question,
            'images' => $images_collection->shuffle(),
        ]);
    }

/*    public function question_5_submit(Request $request)
    {
        $this->saveResponse($request);

        return redirect(route('question-6'));
    }*/

    public function question_6()
    {
        $question = Question::with(['cluster'])->where('slug', 'question-5')->first();
        $images_collection = $this->getImagePerCluster(5, 5, 5, 5, 5);

        return view('question-6', [
            'question' => $question,
            'images' => $images_collection,
        ]);
    }

    private function getImage($number_image_cluster_1, $number_image_cluster_2, $number_image_cluster_3, $number_image_cluster_4, $number_image_cluster_5)
    {
        $images_1 = Image::inRandomOrder()->where('cluster_id', 1)->take($number_image_cluster_1)->get();
        $images_2 = Image::inRandomOrder()->where('cluster_id', 2)->take($number_image_cluster_2)->get();
        $images_3 = Image::inRandomOrder()->where('cluster_id', 3)->take($number_image_cluster_3)->get();
        $images_4 = Image::inRandomOrder()->where('cluster_id', 4)->take($number_image_cluster_4)->get();
        $images_5 = Image::inRandomOrder()->where('cluster_id', 5)->take($number_image_cluster_5)->get();

        $images_collection = new Collection();

        foreach ($images_1 as $image) {
            $images_collection->push($image);
        }

        foreach ($images_2 as $image) {
            $images_collection->push($image);
        }

        foreach ($images_3 as $image) {
            $images_collection->push($image);
        }

        foreach ($images_4 as $image) {
            $images_collection->push($image);
        }

        foreach ($images_5 as $image) {
            $images_collection->push($image);
        }

        return $images_collection;
    }

    private function getImagePerCluster($number_image_cluster_1, $number_image_cluster_2, $number_image_cluster_3, $number_image_cluster_4, $number_image_cluster_5)
    {
        $images_1 = Image::inRandomOrder()->where('cluster_id', 1)->take($number_image_cluster_1)->get();
        $images_2 = Image::inRandomOrder()->where('cluster_id', 2)->take($number_image_cluster_2)->get();
        $images_3 = Image::inRandomOrder()->where('cluster_id', 3)->take($number_image_cluster_3)->get();
        $images_4 = Image::inRandomOrder()->where('cluster_id', 4)->take($number_image_cluster_4)->get();
        $images_5 = Image::inRandomOrder()->where('cluster_id', 5)->take($number_image_cluster_5)->get();

        $images_collection = new Collection();
        $images_collection->push($images_1);
        $images_collection->push($images_2);
        $images_collection->push($images_3);
        $images_collection->push($images_4);
        $images_collection->push($images_5);

        $collection_2 = new Collection();
        $images_collection_shuffle = $images_collection->shuffle();

        for ($index = 0; $index < sizeof($images_collection_shuffle->toArray()); $index++) {
            for ($index2 = 0; $index2 < sizeof($images_collection_shuffle[$index]->toArray()); $index2++) {
                $collection_2->push($images_collection_shuffle[$index][$index2]);
            }
        }

        return $collection_2;
    }

    private function saveResponse($request)
    {
        $end_time = microtime(true);
        $question = Question::with(['cluster'])->find($request->get('question_id'));
        $image = Image::with(['cluster'])->find($request->get('image_id'));

        $response = Response::where(['question_id' => $request->get('question_id'), 'participant_id' => $request->get('participant_id')])->first();

//        dd($question, $response, $request->all());

        if ($question->cluster->id == $image->cluster->id) {
            if (isset($response)) {
                $response->update([
                    'question_id' => $request->get('question_id'),
                    'participant_id' => $request->get('participant_id'),
                    'image_id' => $request->get('image_id'),
                    'time' => date('H:i:s', $end_time - session('start_time')),
                    'true' => $question->cluster->id == $image->cluster->id,
                ]);
            } else {
                \App\Models\Response::create([
                    'question_id' => $request->get('question_id'),
                    'participant_id' => $request->get('participant_id'),
                    'image_id' => $request->get('image_id'),
                    'time' => date('H:i:s', $end_time - session('start_time')),
                    'true' => $question->cluster->id == $image->cluster->id,
                ]);
            }

            return true;
        }
        return false;
    }

    public function getShuffleImages()
    {
        return Image::all();
    }

    public function question_submit(Request $request)
    {
        $true = $this->saveResponse($request);

        if ($true) {
            return [
                'response' => true,
                'url' => route('question-' . $request->get('next_question'))
            ];
        } else {
            return [
                'response' => false,
            ];
        }

    }
}
