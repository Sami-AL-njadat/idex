<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\blog;
use App\Models\article;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        return view('dashboard/layout/home');
    }

    public function addBlog()
    {
        return view('page/blog/add');
    }

    public function editArticle($id)
    {
        $article = article::find($id);

        return view('page.article.edit', compact('article'));
    }


    public function addArticle()
    {
        return view('page/article/add');
    }

    public function editBlog($id)
    {
        $blog = blog::find($id);

        return view('page.blog.edit', compact('blog'));
    }


    public function allBlog()
    {
        $blogs = Blog::orderBy('title', 'desc')->paginate(10);

        if ($blogs->isEmpty()) {
            return view('page.blog.blog')->with('info', 'No Blog To show!');
        } else {

            return view('page.blog.blog', compact('blogs'));
        }
    }
}
