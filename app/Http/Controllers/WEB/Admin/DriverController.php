<?php

namespace App\Http\Controllers\WEB\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;
// use Mail;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\User;

use App\Models\Language;
use App\Models\Product;
use App\Models\ProductTranslations;
use App\Models\Rate;
use App\Models\ProductOrder;
use App\Models\Order;
use App\Models\Features;
use App\Models\Image;

class DriverController extends Controller
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
        $users = User::where('name','like','%'.$search.'%')->where('user_type',1);
        $users = $users->orderBy('id', 'desc')->paginate(10);

        return view('admin.craft_man.home', [
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
        return view('admin.craft_man.create',['users'=>$users]);
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

            return 'success';
        }
        return 'fail';
    }

    public function edit_password(Request $request, $id)
    {
       //dd($id);
        //return $craftname;
        $users = User::findOrFail($id);
        $locales = Language::all();
        return view('admin.craft_man.edit_password',['users'=>$users,'locales'=>$locales]);
    }


    public function update_password (Request $request, $id)
    {
        //dd($request->all());
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->details = $request->details;
        $user->password = Hash::make($request->password);
        $user->save();



          $data22 = array(
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> $request->password,
    );
         

         Mail::send('email.email', $data22, function ($message) use ($data22) {
           //dd($this->user->name);
           $message->to($data22['email'], $data22['name'],$data22['password'])
               ->subject('Agree Craft User And Given password ')
               ->replyTo('Craftatkw@gmail.com', $name = null)
               ->from('Craftatkw@gmail.com', 'Craftatkw@gmail.com');

       });

        
         return redirect()->back()->with('success','Send Password to Email Successfully');
    }



   
}
