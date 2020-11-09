@extends('layouts.master')

@section('content')


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>order</title>
    <link rel="stylesheet" href="{{asset('order_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('order_assets')}}/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('order_assets')}}/css/styles.css">
    <style type="text/css">
    .modal{
    
}

/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 400px;
    overflow-y: auto;
}
    </style>
</head>

<body >


 @if(count($orders) >0)
    <div class="table-responsive text-center" style="margin-bottom: 50px;margin-top: 120px;">
       <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" colspan="5" style="font-size: 20px;background-color: #000000;color: #EEEFF6;">Order History&nbsp;<span class="badge badge-pill badge-danger" style="color: rgb(0,0,0);background-color: rgb(255,255,255);">{{count($orders)}}</span></th>
                </tr>
            </thead>
            <tbody>
         
                <tr class="border-success" style="background-color: rgba(177,24,24,0.05);">
                    <td style="background-color: #eeeff7;font-weight: bold;font-size:16px;text-align:center;">Order No.</td>
                    
                    <td style="background-color: #eeeff7;font-weight: bold;font-size:16px;text-align:center;">Payment Status</td>
                    <td style="background-color: #eeeff7;font-weight: bold;font-size:16px;text-align:center;">Order Status</td>
                    <td style="background-color: #eeeff7;font-weight: bold;font-size:16px;text-align:center;">Order Details</td>
                    <td style="background-color: #eeeff7;font-weight: bold;font-size:16px;text-align:center;">Order Submission<br></td>
                </tr>

                @foreach ($orders->take(10) as $order)
     <div class="modal fade" id="editModal{{$order->id}}" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div style="font-size:16px;text-align:left;" class="modal-content">
                <div class="modal-header">
                    <h4 style="font-size:18px;" class="modal-title">Order {{$order->id}} Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               
                </div>
         <!------start of modal body-->
          <div style="background-color:#EEEFF6;" class="modal-body">
              <!------start of modal body main row-->
			  <div style="padding:20px;" class="row">
			  
			    <!--start 6 col 1 of modal--->
                <div  class="col-md-6">
                     <h4 style="font-size:16px;"><u>Billing Information</u></h4>

                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
					
                      <div class="col">
                       <div style="" ><strong>Name:</strong></div>
                        <div >{{$order->name}}</div>
                      </div>
					  
                      <div class="col">
                       <div style="" ><strong>City:</strong></div>
                        <div >{{$order->city}}</div>
                      </div>
                    </div>

                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
                       <div class="col">
                       <div style="" ><strong>Contact No:</strong></div>
                       <div >{{$order->contact}}</div>
                       </div>
                      <div class="col">
                      <div style="" ><strong>Email:</strong></div>
                      <div >{{$order->email}}</div>
                      </div>
                     
                    </div>
                  
                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
                     <div class="col">
                       <div style="" ><strong>Address:</strong></div>
                        <div >{{$order->address}}</div>
                     </div>
                      
                    </div>
                   
                </div>
				<!--end of 6 col 1--->
				
                 <div  class="col-md-6">
                 <?php
                 $time =date('h:i A', strtotime($order->created_at));
                 $date =date('d-m-Y', strtotime($order->created_at));
                 $discount=$order->discount;
                 $total=$order->total_price;
                 $shipping =$order->shipping;
                 $total_with_discount =$total-$shipping;
                 $subtotal=$total_with_discount+$discount;
                 ?>
              
                    <h4 style="font-size:16px;"><u>Order Summary</u></h4>
                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
                      <div class="col">
                       <div style="" ><strong>Subtotal:</strong></div>
                        <div >&#x9f3; {{$subtotal}}</div>
                      </div>
                     <div class="col">
                       <div style="" ><strong>Discount:</strong></div>
                        <div >&#x9f3; {{$discount}}</div>
                     </div>
                    </div>

                   
                  
                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
                      <div class="col">
                       <div style="" ><strong>Total With Discount:</strong></div>
                        <div >&#x9f3; {{$total_with_discount}}</div>
                     </div>
                      
                    </div>

                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
                     <div class="col">
                       <div style="" ><strong>Delivery Charge: </strong></div>
                        <div >&#x9f3; {{$shipping}}</div>
                     </div>
                     <div class="col">
                       <div style="" ><strong>Order Total: </strong></div>
                        <div >&#x9f3; {{$total}}</div>
                     </div>
                     
                    </div>

                 </div>
                
             </div>
  
      <!--end of modal body main row--->
        
		
		
		       <!------start of modal body main row2-->
			  <div style="padding:20px;" class="row">
			  
			    <!--start 6 col 1 of modal--->
                <div  class="col-md-6">
                     <h4 style="font-size:16px;"><u>Item Details</u></h4>
					 
					 
					 
					 
					 
                     @foreach($order->cart->items as $item)
                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
					
                      <div class="col">
                       
                        <div  >{{ $item['item']['title']}}</div>
                      </div>
					  
                      <div class="col">
                       
                        <div class="text-center" >Qty: {{ $item['qty']}} </div>
                      </div>
					  
					   <div class="col">
                       
                        <div class="text-center" > &#x9f3; {{ $item['price']}}</div>
                      </div>
                    </div>
					@endforeach

              
                  
                   
                </div>
				<!--end of 6 col 1--->
				<div class="col-md-6">
                    
                       <h4 style="font-size:16px;"><u>Order & Payment Status</u></h4>
                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
                      <div class="col">
                       <div style="" ><strong>Payment:</strong></div>
					    @if($order->payment_status == 1)
                        <div >Paid</div>
						@else
						<div >Not Paid</div>
						@endif
                      </div>
                     <div class="col">
                       <div style="" ><strong>Order:</strong></div>
                        <div >Processing</div>
                     </div>
                    </div>

                   
                  
                    <div style="padding:10px;" class="row" style="margin-bottom:10px;">
                      <div class="col">
                       <div style="" ><strong>Order Processed:</strong></div>
                        <div ><?php echo "Date: ".$date." Time: ".$time;?></div>
                     </div>
                      
                    </div>
		

                </div>
             <!--end of modal body--->
              </div>
               <!--end of modal content--->
                <tr>
               
                    <td style="background-color: #eeeff7;font-size:16px;text-align:center;">{{$order->id}}</td>
                      @if($order->payment_status == 1)
                      <td style="background-color: #eeeff7;font-size:16px;text-align:center;">Paid&nbsp;<i class="far fa-check-circle" style="color: rgb(49,139,74);"></i></td>
                      @else
                      <td style="background-color: #eeeff7;font-size:16px;text-align:center;">Not Paid&nbsp;<i class="far fa-times-circle" style="color: rgb(237,11,52);"></i></td>
                      @endif
                    <td style="background-color: #eeeff7;font-size:16px;text-align:center;">Shipped</td>
                    <td style="background-color: #eeeff7;font-size:16px;text-align:center;"><button style="background-color:#EEEFF6;border:none;" type="button"  data-toggle="modal" data-id="{{ $order->id }}" data-target="#editModal{{$order->id}}"><i title="view order details" class="fas fa-binoculars" style="color: rgb(0,0,0);"></i></button></td>
                    <td style="background-color: #eeeff7;font-size:16px;text-align:center;"><?php echo "Date: ".$date." Time: ".$time;?><br></td>
                   
                    </tr>
                    
                 

        </div>
        </div> 
<!--end of modal--->


                 @endforeach
                
            </tbody>
        </table>
      
     


        </div>
    </div>
@else
<div class="table-responsive text-center" style="margin-bottom: 70px;margin-top: 150px;">
       <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" colspan="5" style="font-size: 20px;background-color: #000000;color: #EEEFF6;">Order History&nbsp;<span class="badge badge-pill badge-danger" style="color: rgb(0,0,0);background-color: rgb(255,255,255);">{{count($orders)}}</span></th>
                </tr>

            </thead>
            <tbody>
        
             <tr class="border-success" style="background-color: rgba(177,24,24,0.05);">
             <td style="background-color: #eeeff7;font-weight: bold;font-size:16px;text-align:center;" colspan="5">No order in the list.</td>
             </tr>
            </tbody>
            </table>
           </div>
           </div>
 @endsection
@endif

</body>

</html>



