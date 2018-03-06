<?php

namespace App\Http\Controllers\WEB\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Features;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Catsize;
use App\Models\ProductTranslations;
use Auth;
use App\User;
use LaravelLocalization;

use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
       
        view()->share([
             
            'locales' => Language::all(),
            'setting' => Setting::query()->first(),
        ]);
    }

    public function index(Request $request)
    {

        if ($request->expectsJson()) {
            if (auth()->check()) {
                return auth()->user();
            }
        }
      
        return view('home');
    }

    
}
