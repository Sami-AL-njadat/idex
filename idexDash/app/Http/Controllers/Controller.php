<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\article;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        return view('dashboard/layout/home');
    }
 
    public function dash()
    {
        return view('dash/layout/home');
    }

    public function addBlog()
    {
        return view('page/blog/add');
    }

    public function editArticle( $id)
    {

        // Find the current article by ID
        $article = Article::find($id);


        if (!$article) {
            return redirect()->back()->with('error', 'Article not found');
        }   
         $currentBlogId = $article->blog_id;

         $blogs = Blog::leftJoin('articles', 'blogs.id', '=', 'articles.blog_id')
        ->where(function ($query) use ($currentBlogId) {
            $query->whereNull('articles.blog_id')
            ->orWhere('articles.blog_id', $currentBlogId);
        })
            ->select('blogs.*')
            ->distinct()
            ->get();

        return view('page.article.edit', compact('article', 'blogs'));
    }


    public function addArticle()
    {
        $blogs = Blog::leftJoin('articles', 'blogs.id', '=', 'articles.blog_id')
        ->whereNull('articles.blog_id')
        ->select('blogs.*')
        ->get();; 
        return view('page/article/add', compact('blogs'));
    }

    public function editBlog($id)
    {
        $blog = Blog::find($id); 
        return view('page/blog/edit', compact('blog'));
    }


    public function allBlog()
    {
        $blogs = Blog::all();

        if ($blogs->isEmpty()) {
            return view('page.blog.blog')->with('info', 'No Blog To show!');
        } else {

            return view('page.blog.blog', compact('blogs'));
        }
    }
    public function allArticle()
    {
        $articles = Article::with('blog')->get();

        if ($articles->isEmpty()) {
            return view('page.article.article')->with('info', 'No Blog To show!');
        } else {
            return view('page.article.article', compact('articles'));
        }
    }
}
 