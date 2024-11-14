<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Cloudinary\Cloudinary;

class ProductController extends Controller
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
    }

    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048', // Max 2MB
            // Add other fields as necessary
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $uploadedFileUrl = $this->cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'folder' => 'FurniStyle'
            ])['secure_url'];
        }

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image_url' => $uploadedFileUrl ?? null,
            // Add other fields as necessary
        ]);

        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }

    /**
     * Remove the specified product.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the product image if exists
        if ($product->image_url) {
            $publicId = pathinfo($product->image_url, PATHINFO_FILENAME);
            $this->cloudinary->uploadApi()->destroy('products/' . $publicId);
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
}
