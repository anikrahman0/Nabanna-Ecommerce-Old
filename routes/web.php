<?php

Route::post('/contact us/submit','MessagesController@submit')->name('contact-form-submit');
Route::get('/contact us/','MessagesController@getContact')->name('contactus');
Route::get('/view messages/','MessagesController@getMessages')->name('getmessages')->middleware('role:super');
Route::get('/orderlist/','OrderController@getOrderview')->name('orderview')->middleware('role:super');
Route::post('/orderlistverify/{$order->id}/verify','OrderController@getOrderverify')->name('orderverify');

Route::get('/search/','ProductController@search')->name('search');


Route::get('/', ['as' => 'home', function () {
    return view('all.home');
}]);

Route::get('/about us', ['as' => 'aboutus', function () {
    return view('all.aboutus');
}]);

Route::get('/product',[

'uses'=>'ProductController@getIndex',
'as'=>'product.index'
]);


Route::get('/add-to-cart/{id}', [

'uses'=>'ProductController@getAddToCart',
'as'=>'product.addToCart'

]);

Route::get('/increase_qty/{id}', [

'uses'=>'ProductController@increaseQuantity',
'as'=>'increase_qty'

]);

Route::get('/reduce/{id}', [

    'uses'=>'ProductController@getReduceByOne',
    'as'=>'product.reduceByOne'
    
    ]);

    Route::get('/remove/{id}', [

        'uses'=>'ProductController@getRemoveItem',
        'as'=>'product.remove'
        
        ]);
  Route::get('/remove/{id}', [

        'uses'=>'ProductController@getRemoveItem',
        'as'=>'product.remove'
        
        ]);
Route::get('/test', function(){

    return view('test');
});

Route::get('/shopping-cart', [

    'uses'=>'ProductController@getCart',
    'as'=>'product.shoppingCart'
    
    ]);

Route::get('/checkout', [

        'uses'=>'ProductController@getCheckout',
        'as'=>'checkout',
        'middleware'=>'auth'
        ]);
        
Route::post('/checkout', [
'uses'=>'ProductController@postCheckout',
 'as'=>'checkout_submit',
'middleware'=>'auth'
 ]);

Route::get('/change_password/', [
'uses'=>'userController@getChangePassword',
 'as'=>'change_password',
'middleware'=>'auth'
 ]);

 Route::post('/reset_password/', [
'uses'=>'userController@postChangePassword',
 'as'=>'reset_password',
'middleware'=>'auth'
 ]);

Route::get('/delete_confirm/', [
'uses'=>'userController@DeleteConfirm',
 'as'=>'delete_confirm',
'middleware'=>'auth'
 ]);

 Route::get('/delete/{id}', [
'uses'=>'userController@Delete',
 'as'=>'user.delete',
'middleware'=>'auth'
 ]);

Route::group(['prefix'=>'user'], function(){

     Route::group(['middleware'=>'guest'],function(){
      
        Route::get('/signup',[

            'uses'=>'UserController@getSignup',
            'as'=>'user.signup'
           
            
            ]);
            
    
        Route::post('/signup',[
    
            'uses'=>'UserController@postSignup',
            'as'=>'user.signup'
          
            
            ]);
        
        Route::get('/signin',[
        
        'uses'=>'UserController@getSignin',
        'as'=>'user.signin'
        
        
        ]);
        Route::post('/signin',[
        
            'uses'=>'UserController@postSignin',
            'as'=>'user.signin'
            
            
            ]);

     });


    Route::group(['middleware'=>'auth'],function(){

        Route::get('/profile/edit/{id}', [

        'uses'=>'userController@edit',
        'as'=>'user.edit'
        
        ]);

         Route::post('/profile/update/{id}', [

        'uses'=>'userController@update',
        'as'=>'user.update'
        
        ]);


        Route::get('/upload/profile-image',[
    
            'uses'=>'UserController@getuploadImage',
            'as'=>'user.upload-profile-image'
            
         
             ]);
       
        Route::post('/upload/profile-image',[
    
            'uses'=>'UserController@updateImage',
            'as'=>'user.upload-profile-image'
            
         
             ]); 

        Route::get('/myorder',[
    
            'uses'=>'UserController@getOrder',
            'as'=>'user.order'
            
         
             ]);
            
         Route::get('/myprofile',[
    
            'uses'=>'UserController@getProfile',
            'as'=>'user.myprofile'
            
         
             ]);
         
         Route::get('/logout',[
         'uses'=>'UserController@getLogout',
         'as'=>'user.logout'
         ]);
    });
    
        

}


);
