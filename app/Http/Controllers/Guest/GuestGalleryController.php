<?php
namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Subcategory;
class GuestGalleryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $images = Image::all();

        return view('guest.galeria', compact('categories', 'subcategories', 'images'));
    }
}