<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    function store(Request $request){
        $data=$request->post();
        $data['mainImage']=$request->file('mainImage')->store("images","public");
        $data['image1']=$request->file('image1')->store("images","public");
        $data['image2']=$request->file('image2')->store("images","public");
        $data['image3']=$request->file('image3')->store("images","public");
        $data['image4']=$request->file('image4')->store("images","public");
        Product::create($data);
        return back()->with('added','product added successfully');
    }
    public function search(Request $request)
    {
        [$value]=array_values($request->post());
        $products=Product::where('title','like','%'.$value.'%')->latest()->paginate(6);
        $products->data=$products->map(function ($item) use ($value) {
                $item->title = str_ireplace($value, '<strong>'.$value.'</strong>', $item->title);
                return $item;
        });
        return view("Admin.search",compact("products","value"));
    }
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('added','product deleted successfully');
    }
    public function forceDeleteProduct($id)
    {
        $product=Product::onlyTrashed()->findOrFail($id);
        Storage::delete('public/'.$product->mainImage);
        Storage::delete('public/'.$product->image1);
        Storage::delete('public/'.$product->image2);
        Storage::delete('public/'.$product->image3);
        Storage::delete('public/'.$product->image4);
        $product->forceDelete();
        return redirect()->back()->with('added','product deleted successfully');
    }
    public function restoreProduct($id)
    {
        $product=Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->back()->with('added','product restored successfully');
    }
}
