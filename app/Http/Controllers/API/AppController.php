<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

//use App\Models\Confirmation;
//use App\Models\Token;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\ConstantController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Psy\Util\Json;
use Mockery\Exception;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Setting;
use App\Models\AdsSplash;
use App\Models\Help;
use DB;

class AppController extends Controller
{
 
    // App Static


    public function message(Request $request)
    {
        //return $request->all();
        
            $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'mobile'=>'required',
            'email'=>'required|email',
            'details'=>'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = $errors->toArray();
                $message = '';
                foreach ($errors as $key => $value) {
                    $message .= $value[0] . ',';
                }
                return mainResponse(false, $message , null, 203, 'items');
            }
        //return $request->all();
        
        
        
        if(!$validator->fails())
        {
            $jobs = New Contact;
            $jobs->name = $request->name;
            $jobs->email = $request->email;
            $jobs->mobile = $request->mobile;
            $jobs->details = $request->details;
            $jobs->save();
            $message = __('errors.sucess_send'); 
            return mainResponse(true, $message , null, 200, 'items');
            
        }
    }


    public function all_pages()
    {
        $items =  Page::all();
        $message = __('success.success_message');
        return mainResponse(true, $message, $items, 200, 'items');
    }

    public function getPage($slug)
    {
        $items =  Page::whereTranslation('slug',$slug)->firstOrFail();
        $message = __('success.success_message');
        return mainResponse(true, $message, $items, 200, 'items');
    }




    public function get_setting()
    {
        //return 'asd';
        $aboutus =  Setting::find(1);
        if (count($aboutus) > 0) {
            $aboutus = $aboutus->toArray();
            $message = __('success') ;
            return mainResponse(true, $message, $aboutus, 200, 'data');
        } else {
            $aboutus = $aboutus->toArray();
            $message = __('Not Found');
            return mainResponse(false, $message, $aboutus, 203, 'data');
        }  
    }


     public function ads()
    {
        //return 'asd';
        $ads =  AdsSplash::where('type', 1)->inRandomOrder()->first();
        if (count($ads) > 0) {
            $ads = $ads->toArray();
            $message = __('success.success_message');
            return mainResponse(true, $message, $ads, 200, 'data');
        } else {
            $ads = $ads->toArray();
            $message = __('success.not_found');
            return mainResponse(false, $message, $ads, 203, 'data');
        }  
    }   
    
    public function slider()
    {
        //return 'asd';
        $slider =  AdsSplash::where('type', 2)->get();
        //return $ads;
        if (count($slider) > 0) {
            //$slider = $ads->toArray();
            $message = __('success.success_message');
            return mainResponse(true, $message, $slider, 200, 'data');
        } else {
            //$slider = $ads->toArray();
            $message = __('success.not_found');
            return mainResponse(false, $message, $slider, 203, 'data');
        }  
    } 



     public function faq()
    {
        $items = Help::all();
        $message = __('success.success_message');
         if (count($items) > 0) {
            $items = $items->toArray();
            $message = __('success.success_message') ;
            return mainResponse(true, $message, $items, 200, 'items');
        } else {
            $items = $items->toArray();
            $message = __('success.not_found');
            return mainResponse(true, $message, $items, 200, 'items');
        }
    }
  







}


