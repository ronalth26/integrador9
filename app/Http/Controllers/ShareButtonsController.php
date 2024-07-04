<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShareButtonsController extends Controller
{
    public function share(){
        $data=[
        'id' => 1,
        'title' => 'The first title',
        'description' => 'This tutorial is about social share buttons in laravel...',
     
        ];
        $shareButtons=\Share::page (
        url('/posts'),
        'here is the text',
        )
        ->facebook()
->telegram()
->linkedin()
->whatsapp()
->reddit()
->twitter()
->pinterest();
return view('posts.index', compact('data', 'shareButtons'));
        }
}
