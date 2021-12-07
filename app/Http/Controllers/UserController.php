<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Image;
use Session;

class UserController extends Controller
{

    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {

        $this->validate($request,
            [
                'email' => 'required|email|unique:users',
                'name' => 'required|unique:users|max:30|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
                'password' => 'required|min:8',
                'gender' => 'required',
                'address' => 'nullable',
                'city' => 'nullable',
                'contact' => 'required||unique:users|regex:/^[0]?1[3456789][0-9]{8}\b/',
                'confirm_password' => 'same:password',
                'date_of_birth' => 'required|date',
            ]);
        $user = new User;
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->gender = $request->input('gender');
        $user->contact = $request->input('contact');

        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->password = bcrypt($request->input('password'));
        $user->confirm_password = bcrypt($request->input('confirm_password'));

        $user->save();
        Auth::login($user);
        if (Session::has('oldUrl')) {

            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        return redirect()->route('user.myprofile')->with('success', 'Account has been created successfully.');

    }

    public function getuploadimage()
    {
        return view('user.up_profile_image');
    }

    public function updateImage(Request $request)
    {
        request()->validate([

            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save(public_path('/images/profile_images/' . $filename));

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();

        return view('user.up_profile_image')->with('success', 'Image uploaded successfully', );

    }

    public function DeleteConfirm()
    {

        return redirect()->route('user.myprofile')->with('success2', 'Do You Really Want to Delete Your Account?');
    }

    public function Delete($id)
    {
        User::destroy($id);

        return redirect()->route('user.signup')->with('success', 'Your profile has been deleted.');
    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {

        $this->validate($request,
            [

                'email' => 'required|email',
                'password' => 'required',

            ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Session::has('oldUrl')) {

                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.order');

        } else {

            return redirect()->back()->with('error', 'User credentials do not match');

        }

    }

    public function getOrder()
    {

        $orders = Auth::user()->orders;

        $orders->transform(function ($order, $key) {

            $order->cart = unserialize($order->cart);

            return $order;
        }
        );

        return view('user.order', ['orders' => $orders]);

    }

    public function getProfile()
    {

        return view('user.profile');

    }

    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('user.edit')->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [

                'email' => "required|unique:users,email,".$id,
                'name' => "required|max:30|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/|unique:users,name,".$id,
                'address' => 'nullable|max:36',
                'gender' => 'required',
                'contact' => "required|regex:/^[0]?1[3456789][0-9]{8}\b/|unique:users,contact,".$id,
                'city' => 'nullable',
                'date_of_birth' => 'required|date',
            ]);

        $p = User::findOrFail($id);
        $p->email = $request->get('email');
        $p->name = $request->get('name');
        $p->address = $request->get('address');
        $p->gender = $request->get('gender');
        $p->contact = $request->get('contact');
        $p->city = $request->get('city');
        $p->date_of_birth = $request->get('date_of_birth');
        $p->save();
        return redirect()->route('user.myprofile')->with('success', 'Profile has been updated succesfully.');
    }

    public function getChangePassword()
    {

        return view('user.change_password');

    }

    public function postChangePassword(Request $request)
    {

        $this->validate($request,
            [

                'current_password' => 'required|password',
                'new_password' => 'required|min:8',
                'confirm_new_password' => 'same:new_password',
            ]);

        User::find(auth()->user()->id)->update(['password' => bcrypt($request->new_password)]);
        return redirect()->route('user.myprofile')->with('success', 'Password succesfully changed.');

        //  if(Auth::attempt(['email'=>$email,'password'=>$password_c]))
        //    {

        //    $p->password = bcrypt($password_n);
        //    $p->confirm_password= bcrypt($password_cn);
        //    $p->save();

        // }
        // else{

        //     return redirect()->back()->with('error','Current Password is Incorrect.');

        // }

        // $p = User::findOrFail($id);

        // $p->password = bcrypt($request->get('new_password'));

        // $p->save();

        //  return redirect()->route('user.myprofile')->with('success','Password succesfully changed.');

    }

    public function getLogout()
    {

        Auth::logout();

        return redirect()->route('user.signin');

    }

}
