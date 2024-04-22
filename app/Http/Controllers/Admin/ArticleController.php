<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('articleCategory')->get();
        return view('admin.articles.index', compact('articles'));
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $filenametostore = $filename.'_'.time().'.'.$extension;

            $request->file('upload')->storeAs('storage/uploads', $filenametostore, 'public');

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function create()
    {
        $articleCategories = ArticleCategory::all(); // Retrieve all article categories
        return view('admin.articles.create', compact('articleCategories'));
    }

    public function store(Request $request)
    {
        try{
        // Validate the incoming request data as needed
        $validatedData = $request->validate([
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'article_category_id' => 'integer',
        ]);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('storage/cover_images', 'public'); // Save the image to the storage

            // Get only the filename (without "public/" in the path)
            $filename = str_replace('public/', '', $imagePath);

            // Add the filename to the validated data
            $validatedData['cover_image'] = $filename;
        }
        // Create a new Article model instance and fill it with the validated data
        $article = new Article($validatedData);

        // Save the new article to the database
        $article->save();

        // You can also add any additional logic here, like uploading a cover image

        // Redirect the user to a specific route after the article is successfully stored
        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully');
        }
        catch (Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully');
    }

    public function edit(Article $article)
    {
        // Fetch the article and its associated category
        $article->load('articleCategory');

        // Fetch all article categories
        $articleCategories = ArticleCategory::all();

        return view('admin.articles.edit', compact('article', 'articleCategories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'article_category_id' => 'exists:article_categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the article by its ID
        $article = Article::findOrFail($id);

        // Update the article with the new data
        $article->title = $request->input('title');
        $article->content = $request->input('content');
   //     $article->article_category_id = $request->input('article_category_id');

        // Handle the cover image upload, if provided
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImagePath = $coverImage->store('storage/cover_images', 'public');
            $article->cover_image = str_replace('public/', '', $coverImagePath);
        }

        // Save the updated article
        $article->save();

        // Redirect back to the article edit page with a success message
        return redirect()->route('admin.articles.edit', $article->id)->with('success', 'Article updated successfully.');
    }
}
