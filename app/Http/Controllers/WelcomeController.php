<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
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

    public function ready_to_start()
    {
        return view('ready-to-start');
    }

    public function go_to_next_step()
    {
        return view('next-step');
    }

    public function ending()
    {
        session()->forget('participant');

        return view('ending');
    }

    public function create_participant(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        $participant = Participant::create($data);
        session()->put('participant', $participant);

        return redirect(route('question', 0));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'age' => 'required|numeric|min:1|max:100',
            'eyes_problems' => 'required|numeric|min:0|max:1',
        ]);
    }
}
