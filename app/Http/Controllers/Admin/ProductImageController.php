<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);

        if ($image->image && Storage::exists('public/' . $image->image)) {
            Storage::delete('public/' . $image->image);
        }

        $image->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
