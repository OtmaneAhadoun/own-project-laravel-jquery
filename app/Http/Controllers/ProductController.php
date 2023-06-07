<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        return redirect('/');
    }
    public function index()
    {
        $items=[];
        if(auth()->check()){
            $user=User::find(auth()->id());
            $items = $user->carts()->whereHas('product', function ($query) {
                $query->whereNull('deleted_at');
            })->latest()->get();
        }
        $product=Product::where('quantity',">",0)->get();
        $total=0;
        if(count($items)){
            $total =$items->sum(function ($item) {
                return str_replace("DH","",$item->product->price) *$item->quantity;
            });
        }
        $categories=Category::all();
        return view('home',compact('product','items','total',"categories"));
    }
    
    public function show(Product $product)
    {
        if($product->quantity==0){
            return redirect('/')->with("failed","the product has been sold");
        }
        $items=[];
        if(auth()->check()){
            $user=User::find(auth()->id());
            $items=$user->carts()->with('product')->latest()->get();
        }
        $productSimilaire=Product::where('quantity',">",0)->get();
        $total=0;
        if(count($items)){
            $total =$items->sum(function ($item) {
                return str_replace("DH","",$item->product->price)*$item->quantity;
            });
        }
        return view('details',compact('product','productSimilaire',"items",'total'));
    }
    public function viewCart(Request $request)
    {
        $items=[];
        $cities = [
            "Agadir",
            "Al Hoceima",
            "Ait Melloul",
            "Asilah",
            "Azemmour",
            "Azrou",
            "Ben Guerir",
            "Beni Mellal",
            "Berkane",
            "Berrechid",
            "Bouskoura",
            "Casablanca",
            "Chefchaouen",
            "Dakhla",
            "El Jadida",
            "El Kelaa des Sraghna",
            "Errachidia",
            "Essaouira",
            "Fes",
            "Fnideq",
            "Guelmim",
            "Guercif",
            "Ifrane",
            "Inezgane",
            "Jerada",
            "Kénitra",
            "Khemisset",
            "Khenifra",
            "Khouribga",
            "Ksar El Kebir",
            "Laayoune",
            "Larache",
            "Marrakech",
            "Martil",
            "Meknes",
            "Midelt",
            "Mohammedia",
            "Nador",
            "Ouarzazate",
            "Oued Zem",
            "Ouezzane",
            "Oujda",
            "Rabat",
            "Safi",
            "Sale",
            "Sefrou",
            "Settat",
            "Sidi Bennour",
            "Sidi Ifni",
            "Sidi Kacem",
            "Sidi Slimane",
            "Skhirat",
            "Tangier",
            "Tan-Tan",
            "Taza",
            "Temara",
            "Tetouan",
            "Tifelt",
            "Tiznit",
            "Youssoufia",
            "Zagora"
          ];
        $total=0;
        if(auth()->check()){
            $user=User::find(auth()->id());
            $items=$user->carts()->with('product')->latest()->get();
            if(count($items)){
                $total =$items->sum(function ($item) {
                    return str_replace("DH","",$item->product->price)*$item->quantity;
                });
            }else{
                return redirect('/#overview');
            }
        }else{
            $items=session()->get('cart',[]);
            if(count($items)){
                $total=array_reduce($items,function($current,$item){
                    return $current+str_replace("DH","",$item['product']->price)*$item['quantity'];
                },0);
            }else{
                return redirect('/#overview');
            }
        }
        $product=Product::all();
        return view("Cart",compact('product','items','total','cities'));
    }
    public function searchClient(Request $request)
    {
        $value=$request->value;
        $products=Product::where('title','like','%'.$value.'%')->where('quantity',">",0)->get();
        $products->data=$products->map(function ($item) use ($value) {
            $item->title = str_ireplace($value, '<strong>'.$value.'</strong>', $item->title);
            return $item;
        });
        return view('SearchResult',compact('products','value'));
    }
    function filterByCaregory(Request $request){
        if($request->ajax()){
            if($request->category=='all'){
                $products=Product::where('quantity',">",0)->get();
                return view('filterResult',compact('products'));
            }
            $products=Category::where('title',$request->category)->first()->products()->where('quantity',">",0)->get();
            return view('filterResult',compact('products'));
        }
    }
}
