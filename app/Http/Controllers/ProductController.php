<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use Carbon;
use App\Product;
use Auth;
use App\Order;
class ProductController extends Controller
{
    public function getIndex(){

        $products = Product::inRandomOrder()->take(60)->get();
        return view('shop.index',['products'=>$products]);
    }


public function increaseQuantity(Request $request, $id) {
     
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        //dd($request->session()->get('cart'));

    return redirect()->route('product.shoppingCart')->with('success','1 item added');

    }




    public function getAddToCart(Request $request, $id) {
     
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        //dd($request->session()->get('cart'));

    return redirect()->route('product.index')->with('success','New item has been added to the cart');


    }

   public function getReduceByOne(Request $request, $id){
  
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if( count($cart->items) > 0 ){
            $request->session()->put('cart', $cart);
        }
    
        else{
            Session::forget('cart');
        }
       return redirect()->route('product.shoppingCart')->with('success_rmv','1 item removed');
    

   }

   public function getRemoveItem(Request $request, $id){

    $oldCart = Session::has('cart') ? Session::get('cart') : null ;
    $cart = new Cart($oldCart);
    $cart-> removeItem($id);

    if( count($cart->items) > 0 ){
        $request->session()->put('cart', $cart);
    }

    else{
        Session::forget('cart');
    }
   return redirect()->route('product.shoppingCart');




   }

   public function search(Request $request){
   
   $this->validate($request,
    [
        'query'=> 'required',
        
        
    ]);

    $query = $request->input('query');
    $products = Product::where('title','like','%'.$query.'%')->get();
    return view('search-results')->with(
        
        'products',$products
    
    );

   }

   /// shopping cart view 
    public function getCart(){
      if(!Session::has('cart'))
      {
       return view ('shop.shopping-cart');

      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $items=$cart->items;
      $totalPrice=  $cart->totalPrice;
      $shipping= $cart->shipping;
      $total_d=$cart->total_d;
      $n=$cart->n;
      $n = $totalPrice;
     


      if($n >=1050 )
      {
       
         $total_d=($totalPrice *15)/100;
        $n =$n - $total_d; 
        $total = $n +$shipping;

         return view('shop.shopping-cart',
      [
    
      'products' => $items, 
      'totalPrice' => $totalPrice,
      'shipping'=>$shipping,
      'total'=>$total,
      'n'=>$n,
      'total_d'=>$total_d,
      
     
      
      ])->with('success','15% Discount added to your purchased product');
        
      }
      else{
       $total= $totalPrice + $shipping;
        return view('shop.shopping-cart',
      [
    
      'products' => $items, 
      'totalPrice' => $totalPrice,
      'shipping'=>$shipping,
      'total'=>$total,
      'n'=>$n,
      'total_d'=>$total_d,
      
      ])->with('success','No Discount Added');
      }
      
    }

    public function getCheckout(){
      

    if(!Session::has('cart'))
    {

        return view('shop.shopping-cart');
    }
    $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $items=$cart->items;
      $totalPrice=  $cart->totalPrice;
      $shipping= $cart->shipping;
      $total_d=$cart->total_d;
      $n=$cart->n;
      $n = $totalPrice;
     


      if($n >=1050 )
      {
       
         $total_d=($totalPrice *15)/100;
        $n =$n - $total_d; 
        $total = $n +$shipping;

         return view('shop.checkout',
      [
    
      'products' => $items, 
      'totalPrice' => $totalPrice,
      'shipping'=>$shipping,
      'total'=>$total,
      'n'=>$n,
      'total_d'=>$total_d,
     
     
      
      ]);
        
      }
      else{
       $total= $totalPrice + $shipping;
        return view('shop.checkout',
      [
    
      'products' => $items, 
      'totalPrice' => $totalPrice,
      'shipping'=>$shipping,
      'total'=>$total,
      'n'=>$n,
      'total_d'=>$total_d,
      
      ]);
      }
    }

    public function postCheckout(Request $request){


        $this->validate($request,
    [
        'name'=> 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        'city'=> 'required',
        'address' => 'required',
        'contact' =>'required|regex:/^[0]?1[3456789][0-9]{8}\b/',
        
    ]);
    
        if(!Session::has('cart')){

            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice=  $cart->totalPrice;
        $shipping= $cart->shipping;
        $total_d=$cart->total_d;
        $n=$cart->n;
        $n = $totalPrice;
     

 
       if($n >=1050 )
       {
       
         $total_d=($totalPrice *15)/100;
        $n =$n - $total_d; 
        $total = $n +$shipping;
        
      }
      else{
       $total= $totalPrice + $shipping;
        
      }
        


        $payment_status=0;
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->city = $request->input('city');
        $order->contact = $request->input('contact');
        $order->discount = $total_d;
        $order->shipping = $shipping;
        $order->total_price = $total;
        $order->payment_status =  $payment_status;
            
     
        
        Auth::user()->orders()->save($order);
        
          
        Session::forget('cart');

        return redirect()->route('product.index')->with('success','Thank You! You Will Get Your Product Very Soon');
     
    }

   
}