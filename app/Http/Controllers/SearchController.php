<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $results = null;

        if ($query = $request->get('query')) {
            // $results = Article::search($query)->get();
            // $results = Article::search($query)->where('published', '0')->get();
            $results = Article::search($query)->paginate();
        }

        return view('search',[
            'results' => $results,
        ]);
    }
}
