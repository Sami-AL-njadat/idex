<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use HTMLPurifier;
use HTMLPurifier_Config;
use Flasher\Laravel\Facade\Flasher;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = blog::all();

        if ($blog->isEmpty()) {
            $data = [
                'status' => 404,
                'message' => 'No blogs found',
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                'status' => 200,
                'blog' => $blog,
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:120',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:25000',
        ]);
        if ($validator->fails()) {
            $errorMessage = implode('<h1>', $validator->errors()->all());
            Flasher::addError($errorMessage, 'Validation Error');
            return redirect()->back();
        }

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $purifier->purify($request->description);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/imageBlog'), $imageName);
            $blog->image = 'imageBlog/' . $imageName;
        }

        $blog->save();

        return redirect()->back()->with('success', 'Blog added successfully!');
    }





    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = blog::find($id);

        if (is_null($blog)) {
            return response()->json([
                'status' => 404,
                'message' => 'No blog found with this ID.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'blog' => $blog,
        ], 200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'title' => 'string|nullable',
            'description' => 'string|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:25000|nullable',
        ]);

         if ($validator->fails()) {
            $errorMessage = implode('<br>', $validator->errors()->all());
            return redirect()->back()->with('error', $errorMessage);
        }

         $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found');
        }

         $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $changes = false;

         if ($request->filled('title') && $blog->title !== $request->title) {
            $blog->title = $request->title;
            $changes = true;
        }

         if ($request->filled('description')) {
            $cleanedDescription = $purifier->purify($request->description);
            if ($blog->description !== $cleanedDescription) {
                $blog->description = $cleanedDescription;
                $changes = true;
            }
        }

         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/imageBlog'), $imageName);
            $blog->image = 'imageBlog/' . $imageName;
            $changes = true;
        }

         if ($changes) {
            $blog->save();
            return redirect()->back()->with('success', 'Blog updated successfully');
        } else {
            return redirect()->back()->with('info', 'No changes were made');
        }
    }




    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
        {        
            $delete = blog::find($id);
            if (!$delete) {
                return redirect()->back()->with('error', 'Blog not found');
            }
            $delete->delete();

            return redirect()->route('page.blog')->with('success', 'Blog deleted successfully');
        }
}