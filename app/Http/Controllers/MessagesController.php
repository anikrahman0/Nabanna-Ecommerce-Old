<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function submit(Request $request){
    
        $this->validate($request,
        [
            'name'=> 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        
        //create new message
    
        $message= new Message;
        $message -> name = $request->input('name');
        $message -> email = $request->input('email');
        $message -> message= $request->input('message');
    
        $message->save();
    
        return redirect('/contact us')->with('success','Message sent Successfully.');
    
    
        
        }
    
        public function getMessages(){
    
      $messages = Message::all();
    
      return view('all.messagesview')->with('messages',$messages);
    
        }

        public function getContact(){
    
            return view('all.contactus');
      
         }
}
