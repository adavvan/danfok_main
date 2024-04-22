<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminGalleryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $images = Image::all();

        return view('admin.gallery', compact('categories', 'subcategories', 'images'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Subcategory created successfully.');
    }

    public function destroySubcategory(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->back()->with('success', 'Subcategory deleted successfully.');
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagePath = $file->store('storage/images', 'public');

                $images[] = [
                    'subcategory_id' => $request->subcategory_id,
                    'image_path' => $imagePath,
                ];
            }
        }

        Image::insert($images);

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }


    public function destroyImage(Image $image)
    {
        // Delete the image file from the storage
        Storage::disk('public')->delete($image->image_path);

        // Delete the image record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
