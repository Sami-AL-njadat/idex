<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use HTMLPurifier;
use HTMLPurifier_Config;
use Flasher\Laravel\Facade\Flasher;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $article = article::all();

        // if ($article->isEmpty()) {
        //     $data = [
        //         'status' => 404,
        //         'message' => 'No article found',
        //     ];
        //     return response()->json($data, 404);
        // } else {
        //     $data = [
        //         'status' => 200,
        //         'article' => $article,
        //     ];
        //     return response()->json($data, 200);
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'blog_id' => [
                'required',
                'exists:blogs,id',
                function ($attribute, $value, $fail) {
                    if (Article::where('blog_id', $value)->count() >= 1) {
                        $fail('You can only add up to one articles for the same blog');
                    }
                },
            ],
            'header' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'header_two' => 'nullable|string|max:255',
            'paragraph_two' => 'nullable|string',
            'image1' => 'nullable|image|max:25000',
            'image2' => 'nullable|image|max:25000'
        ]);

        
        if ($validator->fails()) {
            $errorMessage = implode('<br>', $validator->errors()->all());
            Flasher::addError($errorMessage, 'Validation Error');
            return redirect()->back();
        }

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $article = Article::create([
            'blog_id' => $request->blog_id,
            'header' => $request->header,
            'paragraph' => $purifier->purify($request->paragraph),
            'header_two' => $request->header_two,
            'paragraph_two' => $purifier->purify($request->paragraph_two),
            'image1' => $request->hasFile('image1') ? $this->uploadImage($request->file('image1')) : null,
            'image2' => $request->hasFile('image2') ? $this->uploadImage($request->file('image2')) : null,
        
        ]);

        return redirect()->back()->with('success', 'Article created successfully');
    }


    // private function uploadImage($image)
    // {
    //     $filename = time() . '.' . $image->getClientOriginalExtension();
    //     $image->move(public_path('ArticleImage'), $filename);
    //     return $filename;
    // }

 
 
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $blog = Blog::find($id);
        // $articles = Article::where('blog_id', $id)->get();

        // if (is_null($blog)) {
        //     return response()->json([
        //         'status' => 404,
        //         'message' => 'No blog found with this ID.',
        //     ], 404);
        // }


        // $filteredArticles = $articles->map(function ($article) {
        //     return [
        //         'id' => $article->id,
        //         'header' => $article->header,
        //         'paragraph' => $article->paragraph,
        //         'header_two' => $article->header_two,
        //         'paragraph_two' => $article->paragraph_two,
        //         'image1' => $article->image1,
        //         'image2' => $article->image2,
        //     ];
        // });

        // $data = [
        //     'status' => 200,
        //     'blog' => $blog,
        //     'articles' => $filteredArticles,
        // ];

        // return response()->json($data, 200);
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $articleId)
{
    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'blog_id' => 'exists:blogs,id|nullable',
        'header' => 'string|max:255|nullable',
        'paragraph' => 'string|nullable',
        'header_two' => 'string|max:255|nullable',
        'paragraph_two' => 'string|nullable',
        'image1' => 'image|max:25000|nullable',
        'image2' => 'image|max:25000|nullable'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $article = Article::find($articleId);

    if (!$article) {
        return redirect()->route('page.article')->with('error', 'Article not found');
    }

    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);

    $changes = false;

    if ($request->filled('blog_id') && $article->blog_id !== $request->blog_id) {
        $article->blog_id = $request->blog_id;
        $changes = true;
    }

    if ($request->filled('header') && $article->header !== $request->header) {
        $article->header = $request->header;
        $changes = true;
    }

    if ($request->filled('paragraph')) {
        $cleanedParagraph = $purifier->purify($request->paragraph);
        if ($article->paragraph !== $cleanedParagraph) {
            $article->paragraph = $cleanedParagraph;
            $changes = true;
    }

    if ($request->filled('header_two') && $article->header_two !== $request->header_two) {
        $article->header_two = $request->header_two;
        $changes = true;
    }

    if ($request->filled('paragraph_two')) {
        $cleanedParagraphTwo = $purifier->purify($request->paragraph_two);
        if ($article->paragraph_two !== $cleanedParagraphTwo) {
            $article->paragraph_two = $cleanedParagraphTwo;
            $changes = true;
        }
    }

    if ($request->hasFile('image1')) {
        $article->image1 = $this->uploadImage($request->file('image1'));
        $changes = true;
    }

    if ($request->hasFile('image2')) {
        $article->image2 = $this->uploadImage($request->file('image2'));
        $changes = true;
    }

    if ($changes) {
        $article->save();
        return redirect()->back()->with('success', 'Article updated successfully');
    } else {
        return redirect()->back()->with('info', 'No changes were made');
    }
    }
}

private function uploadImage($image)
{
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('ArticleImage'), $filename);
    return 'ArticleImage/' . $filename;  
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = article::find($id);
        if (!$delete) {
            return redirect()->back()->with('error', 'Article not found');
        }
        $delete->delete();
        return redirect()->route('page.article')->with('success', 'Article deleted successfully');

     }
}