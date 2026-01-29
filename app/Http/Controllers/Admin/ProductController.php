<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// OR use this if you have Imagick installed
// use Intervention\Image\Drivers\Imagick\Driver;

class ProductController extends Controller
{


    public function __construct()
    {
        // Ensure public folders exist
        if (!Storage::exists('public/products/thumbnails')) {
            Storage::makeDirectory('public/products/thumbnails');
        }
        if (!Storage::exists('public/products/gallery')) {
            Storage::makeDirectory('public/products/gallery');
        }
    }

    private function storeResizedImage($file, $folder, $width, $height = null)
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $folder . '/' . $filename;
        
        $manager = new ImageManager(new Driver());
        
        $img = $manager->read($file);
        
        if ($height) {
            $img->cover($width, $height);
        } else {
            $img->scale(width: $width);
        }
        
        // FIX: Use disk('public') explicitly
        Storage::disk('public')->put($path, (string) $img->encode());
        
        return $path;
    }

    private function storeThumbnailSizes($file, $type = 'thumbnail')
    {
        $sizes = [];
        
        
        $sizes['small'] = $this->storeResizedImage($file, 'products/thumbnails', 300, 300);
        
        
        $sizes['large'] = $this->storeResizedImage($file, 'products/thumbnails', 400, 400);
        
        return $sizes;
    }

    public function index()
    {
        $products = Product::with(['category','brand'])->latest()->paginate(10);
        $category = Category::all();
        $brand = Brand::all();

        return view('admin.componets.products', compact('products','category','brand'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'hover_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_hot' => 'nullable|boolean',
            'is_sale' => 'nullable|boolean',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'is_featured' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
            'is_new' => 'nullable|boolean',
        ]);

        $thumbnailSizes = $this->storeThumbnailSizes($request->file('thumbnail'));
        $hoverThumbnailSizes = $this->storeThumbnailSizes($request->file('hover_thumbnail'));

        $status = 'in_stock';
        if ($request->stock == 0) {
            $status = 'out_stock';
        } elseif ($request->stock <= 2) {
            $status = 'low_stock';
        }

        $isHot = $request->input('is_hot', 0);
        $isSale = $request->input('is_sale', 0);

        if ($isHot == 1 && $isSale == 1) {
            $isHot = 0;
        }

        $isFeatured = $request->input('is_featured', 0);
        $isPopular = $request->input('is_popular', 0);
        $isNew = $request->input('is_new', 0);

        if ($isFeatured == 1) {
            $isPopular = 0;
            $isNew = 0;
        } elseif ($isPopular == 1) {
            $isNew = 0;
        }

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'stock' => $request->stock,
            'thumbnail' => $thumbnailSizes['small'],
            'thumbnail_large' => $thumbnailSizes['large'],
            'hover_thumbnail' => $hoverThumbnailSizes['small'],
            'hover_thumbnail_large' => $hoverThumbnailSizes['large'],
            'description' => $request->description,
            'is_hot' => $isHot, 
            'is_sale' => $isSale,
            'discount_percent' => $request->discount_percent,
            'is_featured' => $isFeatured,
            'is_popular' => $isPopular,
            'is_new' => $isNew,
            'status' => $status,
        ]);

        if($request->hasFile('images')){
            foreach($request->file('images') as $img){
                $path = $this->storeResizedImage($img, 'products/gallery', 800);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product Added');
    }

    public function edit(Product $product)
    {
        $product->load('images', 'category', 'brand');
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'hover_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_hot' => 'nullable|boolean',
            'is_sale' => 'nullable|boolean',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'is_featured' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
            'is_new' => 'nullable|boolean'
        ]);

        $isFeatured = $request->input('is_featured', 0);
        $isPopular = $request->input('is_popular', 0);
        $isNew = $request->input('is_new', 0);

        if ($isFeatured == 1) {
            $isPopular = 0;
            $isNew = 0;
        } elseif ($isPopular == 1) {
            $isNew = 0;
        }

        $isHot = $request->input('is_hot', 0);
        $isSale = $request->input('is_sale', 0);
        
        if ($isHot == 1 && $isSale == 1) {
            $isHot = 0;
        }

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'stock' => $request->stock,
            'description' => $request->description,
            'is_hot' => $isHot,
            'is_sale' => $isSale,
            'discount_percent' => $request->discount_percent,
            'is_featured' => $isFeatured,
            'is_popular' => $isPopular,
            'is_new' => $isNew,
        ];

        if ($request->stock == 0) {
            $data['status'] = 'out_stock';
        } elseif ($request->stock <= 1) {
            $data['status'] = 'low_stock';
        } else {
            $data['status'] = 'in_stock';
        }

        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail && Storage::exists('public/' . $product->thumbnail)) {
                Storage::delete('public/' . $product->thumbnail);
            }
            if ($product->thumbnail_large && Storage::exists('public/' . $product->thumbnail_large)) {
                Storage::delete('public/' . $product->thumbnail_large);
            }
            
            $thumbnailSizes = $this->storeThumbnailSizes($request->file('thumbnail'));
            $data['thumbnail'] = $thumbnailSizes['small'];
            $data['thumbnail_large'] = $thumbnailSizes['large'];
        }

        if ($request->hasFile('hover_thumbnail')) {
            if ($product->hover_thumbnail && Storage::exists('public/' . $product->hover_thumbnail)) {
                Storage::delete('public/' . $product->hover_thumbnail);
            }
            if ($product->hover_thumbnail_large && Storage::exists('public/' . $product->hover_thumbnail_large)) {
                Storage::delete('public/' . $product->hover_thumbnail_large);
            }
            
            $hoverThumbnailSizes = $this->storeThumbnailSizes($request->file('hover_thumbnail'));
            $data['hover_thumbnail'] = $hoverThumbnailSizes['small'];
            $data['hover_thumbnail_large'] = $hoverThumbnailSizes['large'];
        }

        $product->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $this->storeResizedImage($img, 'products/gallery', 800);
                
                $product->images()->create([
                    'image' => $path
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product Updated');
    }

    public function destroy(Product $product)
    {
        if ($product->thumbnail && Storage::exists('public/' . $product->thumbnail)) {
            Storage::delete('public/' . $product->thumbnail);
        }
        
        if ($product->thumbnail_large && Storage::exists('public/' . $product->thumbnail_large)) {
            Storage::delete('public/' . $product->thumbnail_large);
        }

        if ($product->hover_thumbnail && Storage::exists('public/' . $product->hover_thumbnail)) {
            Storage::delete('public/' . $product->hover_thumbnail);
        }
        
        if ($product->hover_thumbnail_large && Storage::exists('public/' . $product->hover_thumbnail_large)) {
            Storage::delete('public/' . $product->hover_thumbnail_large);
        }

        foreach ($product->images as $img) {
            if (Storage::exists('public/' . $img->image)) {
                Storage::delete('public/' . $img->image);
            }
            $img->delete();
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}