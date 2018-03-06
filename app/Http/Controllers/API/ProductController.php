<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

//use App\Models\Confirmation;
//use App\Models\Token;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\ConstantController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Input;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Psy\Util\Json;
use Mockery\Exception;
use DB;

use App\User;
use App\Models\Language;
use App\Models\Product;


class ProductController extends Controller
{
 
     public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp');

    }

   
   


    public function all_products()
    {
        $product =  Product::orderBy('id', 'desc')->get();
       
      
        
        if (count($product) > 0) {
            $product = $product->toArray();
            $message = __('success') ;
            return mainResponse(true, $message, $product, 200, 'data');
        } else {
            $product = $product->toArray();
            $message = __('Not Found');
            return mainResponse(false, $message, $product, 203, 'data');
        }  
    }

    public function home_page(){

        $product_slider =  Product::where('slider',1)->orderBy('id', 'desc')->get();

        $product_home =  Product::where('slider',1)->orderBy('id', 'desc')->get();

       
        
        if (count($product_slider) > 0 or count($product_home) > 0) {
            $product_slider = $product_slider->toArray();
            $product_home = $product_home->toArray();
            $message = __('success') ;
            return response()->json(['status' => true , 'code' => 200, 'message'=>'success' , 'data' => [
                   'product_slider'=> $product_slider,
                   'product_home'=> $product_home ,
                ]]);
        } else {
            $product = $product->toArray();
            $message = __('Not Found');
            return mainResponse(false, $message, $product, 203, 'data');
        }  

    }

  
    
   
    

}


