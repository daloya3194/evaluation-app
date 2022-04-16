<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question_one()
    {
        return view('question-one');
    }
}
