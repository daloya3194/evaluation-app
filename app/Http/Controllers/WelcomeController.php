<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Participant;
use App\Models\Question;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about_you()
    {
        return view('about-you');
    }

    public function demo_task()
    {
        $images_1 = Image::inRandomOrder()->where('cluster_id', 1)->take(1)->get();
        $images_2 = Image::inRandomOrder()->where('cluster_id', 2)->take(6)->get();
        $images_3 = Image::inRandomOrder()->where('cluster_id', 3)->take(6)->get();
        $images_4 = Image::inRandomOrder()->where('cluster_id', 4)->take(7)->get();

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

        session()->put('start_time', microtime(true));

//        dd($images_collection->pluck('id'), $images_collection->shuffle()->pluck('id'));

        return view('demo-task', [
            'participant' => session('participant'),
            'images' => $images_collection->shuffle(),
//            'start_time' => microtime(true),
            'question' => Question::where('slug', 'question-0')->first(),
        ]);
    }

    public function submit_demo_task(Request $request)
    {
        $end_time = microtime(true);
        $response = \App\Models\Response::create($request->all());
        $response->time = date('H:i:s', $end_time - session('start_time'));
        $response->save();

        $question = Question::with(['cluster'])->where('slug', 'question-0')->first();
        $correct = $response->image->cluster->id == $question->cluster->id;

        session()->put('correct', $correct);

        return redirect(route('ready-to-start'));
    }

    public function ready_to_start()
    {
        return view('ready-to-start', [
            'correct' => session('correct')
        ]);
    }

    public function create_participant(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        $participant = Participant::create($data);
        session()->put('participant', $participant);

        return redirect(route('demo-task'));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'age' => 'required|numeric|min:1|max:100',
            'eyes_problems' => 'required|numeric|min:0|max:1',
        ]);
    }
}
