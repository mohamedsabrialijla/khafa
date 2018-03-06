<?php

namespace App\Http\Controllers\WEB\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;

use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\User;
use App\Models\Order;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp','pdf');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function user_profile(Request $request)
    {
         $id = auth::id();
         // return $id;
        $user = User::findOrFail($id);

        return view('users.user_profile',['user'=>$user]);
    }


     public function update_user_profile(Request $request)
    {
        //dd($request->all());

        $id =Auth::id();
          
         $users_rules=array(
            'name'=>'required|string|max:255',
            'email'=>'required|string|unique:users,email,'.$id,
            'mobile'=>'required|min:8',
        );
        $users_validation=Validator::make($request->all(), $users_rules);

        if($users_validation->fails())
        {
            return redirect()->back()->withErrors($users_validation)->withInput();
        }


        $user= User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
       
        //  if(Input::file("profile_image")&&Input::file("profile_image")!=NULL)
        // {
        //     if (Input::file("profile_image")->isValid()) 
        //     {
        //         $destinationPath=public_path('uploads/users');
                
        //         $extension=strtolower(Input::file("profile_image")->getClientOriginalExtension());
        //         //dd($extension);
        //         $array= $this->image_extensions();
        //         if(in_array($extension,$array))
        //         {
        //             $fileName_person=uniqid().'.'.$extension;
        //             Input::file("profile_image")->move($destinationPath, $fileName_person);
        //         }
        //     }
        // }


         //if(isset($fileName_person)){$user->profile_image='uploads/users/'.$fileName_person;}
        
        $user->save();
             
   
 

         return redirect()->back()->with('success','Edit Successfully Data');
           
    }


    public function edit_password()
    {
         $id = Auth::id();
         $user = User::findOrFail($id);
        return view('users.change_password',['user'=>$user]);
    }

     public function update_password (Request $request)
    {
       //dd($request->all());
        $id = Auth::id();
       $users_rules=array(
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password|min:6',
        );
        $users_validation=Validator::make($request->all(), $users_rules);

        if($users_validation->fails())
        {
            return redirect()->back()->withErrors($users_validation)->withInput();
        }
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        
         return redirect()->back()->with('success','تم تعديل كلمة مرور المستخدم بنجاح');
    }




   
}
