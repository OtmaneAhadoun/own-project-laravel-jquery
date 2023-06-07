<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function tologin()
    {
        return view('Admin.adminLogin');
    }
    public function login(LoginRequest $loginRequest)
    {
        $fields=$loginRequest->validated();
        if(Auth::guard("admin")->attempt($fields)){
            $loginRequest->session()->regenerate();
            return redirect()->route("admin.dashboard");
        }
        return back()->with('error','email or password incorrect');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('admin.login');
    }
    function dashboard(Request $request){
        $categories=Category::all();
        $DeletedProducts=Product::onlyTrashed()->latest()->get();
        $brands=Brand::all();
        $products=Product::latest()->paginate(6);
        // $orders=Order::latest()->get();
        $orders = Order::with(['order_items' => function ($query) {
            $query->whereHas('product', function ($query) {
                $query->whereNull('deleted_at');
            });
        }])->latest()->get();
        return view('Admin.dashboard',compact('categories','products','orders','brands','DeletedProducts'));
    }    public function addCategory(Request $request)
    {
        $request->validate(['category'=>'required|unique:categories,title']);
        Category::create(['title'=>$request->category]);
        return back()->with('added','category added successdully');
    }
    public function addBrand(Request $request)
    {
        $request->validate(['brand'=>'required|unique:brands,title']);
        Brand::create(['title'=>$request->brand]);
        return back()->with('added','brand added successdully');
    }
    public function deleteBrand(Brand $brand)
    {
        $brand->delete();
        return back()->with('added','brand '.$brand->title.' deleted successfully');
    }
    public function dropAllBrands(Request $request)
    {
        Brand::whereNotNull('title')->delete();
        return back()->with('added','droped all brands successfully');
    }
    public function deletecategory(Category $category)
    {
        $category->delete();
        return back()->with('added','category '.$category->title.' deleted successfully');
    }
    public function dropAllCategories(Request $request)
    {
        Category::whereNotNull('title')->delete();
        return back()->with('added','all categories successfully');
    }
}
