<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/admin/home';
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required|min:8|unique:users',
            'check' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        //dd($data);
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'user_type' => 0,
            'profile_image' => 'front_end_assets/image/avatar.png',
            'password' => bcrypt($data['password']),
        ]);
    }


    protected function join()
    {
        return view('users.join');  
    }


    protected function add_craft(Request $request){

        // return $request;

         $roles = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'mobile' => 'required|min:8|unique:users',
                'details' => 'required',
                'craft_job' => 'required',
                //'profile_image' => 'required',
            ];


       $this->validate($request, $roles);
           

           // if(Input::file("profile_image")&&Input::file("profile_image")!=NULL)
           //          {
           //              if (Input::file("profile_image")->isValid()) 
           //                  {
           //                      $destinationPath=public_path('uploads/users');
                                
           //                      $extension=strtolower(Input::file("profile_image")->getClientOriginalExtension());
           //                      //dd($extension);
           //                      $array= $this->image_extensions();
           //                      if(in_array($extension,$array))
           //                      {
           //                          $fileName=uniqid().'.'.$extension;
           //                          Input::file("profile_image")->move($destinationPath, $fileName);
           //                      }
           //                  }
           //          }


            $user = User::query()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'profile_image' => 'uploads/users/avatar.png',
                'details' => $request->get('details'),
                'user_type' => 1,
                'craft_job' => $request->craft_job,
                
                // 'profile_image' => $profile_image,
            ]);

             return back()->with('success','Send Data Successfully , Please Check your email');

    }


}
