<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
   public function getOrderverify( Request $request)
   {
       
    //  DB::table('orders')
    //  ->where("orders.id",'=',$id )
    //  ->update(['orders.payment_status'=> 1]);

    $order= new Order;
    $order -> payment_status = $request->input('order');
    
    $order->save();

    return view('all.vieworder')->with('order',"Payment Verified");
       
    
        
   }



   public function getOrderview(){
    
    $order= Order::all();
  
    return view('all.vieworder',['order'=>$order]);
   
  
      }

    
        
   }


