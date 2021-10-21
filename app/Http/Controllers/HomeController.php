<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show()
    {
        $posts =  Post::orderByDesc('created_at')->simplePaginate(5);
        return view('general/home', ['posts' => $posts]);
    }

}
