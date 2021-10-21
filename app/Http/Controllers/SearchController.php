<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        //When the user hits the "/search_posts" route without providing any query parameters, this method returns all the posts from the database. Throwing a 404 warning response can prevent it.
        if (trim($query) == "") {
            return abort(404);
        }
        $results = DB::table('posts')->where('title', 'like', '%' . $query . '%')->orderBy('created_at', 'desc')->simplePaginate(12);
        $results->appends(['query' => $query]);
        $request->session()->flash('query', $query);
        return view("general/search_results",  ['results' => $results]);
    }
}
