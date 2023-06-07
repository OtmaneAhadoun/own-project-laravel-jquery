<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\Registerrequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if(auth()->user()){
            return back();
         }
        $path=$request->path();
        return view('login',compact('path'));
    }
    public function aauth(LoginRequest $request)
    {   
        $data=$request->validated();
        if(Auth::attempt($data)){
            $cart=session()->get('cart',[]);
            if(count($cart)){
                foreach($cart as $item){
                    $cart_item=Cart::where('product_id',$item['product']->id)->where('user_id',auth()->id())->first();
                    if($cart_item){
                        if($cart_item->quantity+$item['quantity']<=$cart_item->product->quantity){
                            $cart_item->quantity+=$item['quantity'];
                            $cart_item->save();
                        }else{                            
                            $cart_item->quantity=$cart_item->product->quantity;
                            $cart_item->save();
                        }
                    }else{
                        Cart::create(['user_id'=>auth()->id(),'product_id'=>$item['product']->id,"quantity"=>$item['quantity']]);
                    }
                }
            }
            $request->session()->regenerate();
            session()->forget('cart');
            return redirect()->intended('/');
        }else{
            return back()->with('error','email or password incorecct');
        }
    }
    public function logout(Request $request)
    {
    Auth::logout();
    
    $request->session()->invalidate();
    
    $request->session()->regenerateToken();
    
    return redirect('/');
    }
    public function toregister(Request $request)
    {
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
        $path=$request->path();
        return view('register',compact('path','cities'));
    }
    public function register(Registerrequest $request){
        $fields=$request->validated();
        $fields['password']=Hash::make($fields['password']);
        if(User::create($fields)) 
        return to_route("tologin")->with('created','your account has been created');
    }
}
