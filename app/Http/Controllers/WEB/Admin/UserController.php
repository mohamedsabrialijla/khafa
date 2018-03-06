<?php

namespace App\Http\Controllers\WEB\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;

use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Models\Order;
use App\Models\ProductOrder;

class UserController extends Controller
{


    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp','pdf');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $search = $request->input('user_search');
        $users = User::where('name','like','%'.$search.'%')->where('user_type',0);
        $users = $users->orderBy('id', 'desc')->paginate(10);

        return view('admin.users.home', [
            'users' => $users,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.users.create',['users'=>$users]);
    }

 

    public function edit($id)
        {
            //dd($id);
            $users = User::findOrFail($id);

            return view('admin.users.edit',['users'=>$users]);
        }

    public function update(Request $request, $id)
    {
        //dd($request->all());
          
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



        $user='';


        $confirmation_code = str_random(20);
        $user= User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
       
         if(Input::file("profile_image")&&Input::file("profile_image")!=NULL)
        {
            if (Input::file("profile_image")->isValid()) 
            {
                $destinationPath=public_path('uploads/users');
                
                $extension=strtolower(Input::file("profile_image")->getClientOriginalExtension());
                //dd($extension);
                $array= $this->image_extensions();
                if(in_array($extension,$array))
                {
                    $fileName_person=uniqid().'.'.$extension;
                    Input::file("profile_image")->move($destinationPath, $fileName_person);
                }
            }
        }


         if(isset($fileName_person)){$user->profile_image='uploads/users/'.$fileName_person;}
        
        
        
      
        // 'code' => $confirmation_code,
        // 'activate' => '0',
        // 'active_phon'=>'0',
        $user->save();
             
       
        // $this->user=$user;

        //       $data22 = array(
        //     'confirmation_code' => $confirmation_code,
        //     'name'= $request->name;
        //     //'code'=>$confirmation_code,
        //     'email'= $request->email;
        //     'password'= $request->password;
        // );
             

        //     Mail::send('email.email', $data22, function($message) {
        //      //dd($this->user->name);    
        //     $message->to($this->user->email, $this->user->name)
        //             ->subject('تطبيق المحامي محمد جميل')
        //     ->replyTo('a@gmail.com', $name = null)
        //     ->from('a@gmail.com', 'a@gmail.com');
                    
        //     });
        //      $email =$this->user->email;
        //      $username =$this->user->name;
        //      $user_id =$this->user->id;
            

         return redirect()->back()->with('success','Edit Successfully Data');
           
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::query()->findOrFail($id);
        if ($users->delete()) {
            $ides = Order::where('user_id',$id)->pluck('id')->toArray();
            Order::where('user_id',$id)->delete();
            ProductOrder::whereIn('order_id',$ides)->delete();
            return 'success';
        }
        return 'fail';
    }

   
}
