<?php

namespace App\Http\Controllers\WEB\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;
use Illuminate\Support\Facades\Validator;

use App\Admin;

class HomeController extends Controller
{

	public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp','pdf');

    }


    public function index()
    {
//        return \Request::route()->getName();
        return view('admin.dashboard');
    }


    public function profile(Request $request)
    {
    	$admins = Admin::query()->findOrFail(1);
    	// return $admins;
    	return view('admin.profile.edit',['admins'=>$admins]);
    }

    public function update(Request $request)
    {
    	//dd($request->all());
    	$users_rules=array(
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
        );
        $users_validation=Validator::make($request->all(), $users_rules);

        if($users_validation->fails())
        {
            return redirect()->back()->withErrors($users_validation)->withInput();
        }



        $admins= Admin::findOrFail(1);
        $admins->name = $request->name;
        $admins->email = $request->email;

         if(Input::file("image")&&Input::file("image")!=NULL)
        {
            if (Input::file("image")->isValid()) 
            {
                $destinationPath=public_path('uploads/admin');
                
                $extension=strtolower(Input::file("image")->getClientOriginalExtension());
                //dd($extension);
                $array= $this->image_extensions();
                if(in_array($extension,$array))
                {
                    $fileName_person=uniqid().'.'.$extension;
                    Input::file("image")->move($destinationPath, $fileName_person);
                }
            }
        }


        if(isset($fileName_person)){$admins->profile_image= 'uploads/admin/'.$fileName_person;}

        $admins->save();

        return redirect()->back()->with('success','تم تعديل بيانات المدير بنجاح');

          
    }


    public function update_password (Request $request)
    {
       //dd($request->all());
       $users_rules=array(
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        );
        $users_validation=Validator::make($request->all(), $users_rules);

        if($users_validation->fails())
        {
            return redirect()->back()->withErrors($users_validation)->withInput();
        }
        $admins = Admin::findOrFail(1);
        $admins->password = Hash::make($request->password);
        $admins->save();

         return redirect()->back()->with('success','تم تعديل كلمة مرور المستخدم بنجاح');
    }

}
