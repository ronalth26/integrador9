<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        //dd('X');
        return view('feedbacks.index');
    }
}
