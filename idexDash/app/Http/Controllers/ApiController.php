<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\blog;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $article = article::all();

        if ($article->isEmpty()) {
            $data = [
                'status' => 404,
                'message' => 'No article found',
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                'status' => 200,
                'article' => $article,
            ];
            return response()->json($data, 200);
        }
    }


    public function show($id)
    {
        $blog = Blog::find($id);
        $articles = Article::where('blog_id', $id)->get();

        if (is_null($blog)) {
            return response()->json([
                'status' => 404,
                'message' => 'No blog found with this ID.',
            ], 404);
        }


        $filteredArticles = $articles->map(function ($article) {
            return [
                'id' => $article->id,
                'header' => $article->header,
                'paragraph' => $article->paragraph,
                'header_two' => $article->header_two,
                'paragraph_two' => $article->paragraph_two,
                'image1' => $article->image1,
                'image2' => $article->image2,
            ];
        });

        $data = [
            'status' => 200,
            'blog' => $blog,
            'articles' => $filteredArticles,
        ];

        return response()->json($data, 200);
    }
}
