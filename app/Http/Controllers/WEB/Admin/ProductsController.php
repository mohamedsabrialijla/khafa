<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewPostNotification;

use App\User;
use App\Models\Language;
use App\Models\ Product;
use App\Models\Category;
use App\Models\Catsize;
use App\Models\Subcategory;
use App\Models\Favourit;
use App\Models\Image;
use App\Models\Features;
use App\Models\ProductTranslations;
use App\Models\Rate;
use App\Models\ProductOrder;
use App\Models\Order;
use App\Models\Company;



class ProductsController extends Controller
{
   


    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp');

    }


    public function index(Request $request)
    {
        $products = Product::with('category')->with('subcategory')->orderBy('id', 'desc')->get();
        //return $products;

        $locales = Language::all();

        return view('admin.products.home', [
            'products' => $products,
            'locales' => $locales,
        ]);
    }


    public function create(){
        $locales = Language::all();
        $company = Company::all();
        return view('admin.products.create',['locales'=>$locales,'company'=>$company]);
    }

    public function store(Request $request){

        //dd($request->all());

         $locales = Language::all()->pluck('lang');
            $roles = [
                'company_id'=>'required|int',
                'price'=>'required|int',
                'quentity'=>'required|int',
                'image'=>'image|mimes:jpg,png,jpeg,gif,bmp|max:5000',
            ];
            
            
            foreach ($locales as $locale) {
                $roles['name_' . $locale] = 'required';
                $roles['description_' . $locale] = 'required';
            }
            
             $this->validate($request, $roles);

            
            $products= New Product() ;
            
            foreach ($locales as $locale) 
            {
                $products->translateOrNew($locale)->name = $request->get('name_' . $locale);
                $products->translateOrNew($locale)->description = $request->get('description_' . $locale);
            }        


            $products->company_id= $request->company_id;
            $products->price= $request->price;
            $products->discount= $request->discount;
            $products->quentity= $request->quentity;
            if($request->slider){
            $products->slider= $request->slider;}else{$products->slider= 0;}
            if($request->homepage){
            $products->home_page= $request->homepage;}else{$products->home_page= 0;}

             if(Input::file("image")&&Input::file("image")!=NULL)
                    {
                        if (Input::file("image")->isValid()) 
                            {
                                $destinationPath=public_path('uploads/products');
                                
                                $extension=strtolower(Input::file("image")->getClientOriginalExtension());
                                //dd($extension);
                                $array= $this->image_extensions();
                                if(in_array($extension,$array))
                                {
                                    $fileName=uniqid().'.'.$extension;
                                    Input::file("image")->move($destinationPath, $fileName);
                                }
                            }
                    }

            if(isset($fileName)){$products->image='uploads/products/'.$fileName;}

            $products->save();

            return back()->with('success','The Product Save Successfully');


    }

    
    public function destroy($id)
    {
        //dd($id);
        $issue = Product::query()->findOrFail($id);
        if ($issue->delete()) {
            ProductTranslations::where('product_id',$id)->delete();
            $ides_order = ProductOrder::where('product_id',$id)->pluck('order_id')->toArray();
            ProductOrder::where('product_id',$id)->delete();
            Order::whereIn('id',$ides_order)->delete();
            Rate::where('product_id',$id)->delete();
            return 'success';
        }
        return 'fail';
    }


    public function edit($id)
    {
        $locales = Language::all();
        $products = Product::findOrFail($id);
        $company = Company::all();

        return view('admin.products.edit',['locales'=>$locales,'products'=>$products, 'company'=>$company]);
    }

    public function update(Request $request, $id)
    {
        $locales = Language::all()->pluck('lang');
            $roles = [
                'price'=>'required|int',
                'quentity'=>'required|int',
                'company_id'=>'required|int',
                //'image'=>'image|mimes:jpg,png,jpeg,gif,bmp|max:5000',
            ];

            if(Input::file("image")&&Input::file("image")!=NULL){
                $roles = [
                'image'=>'image|mimes:jpg,png,jpeg,gif,bmp|max:5000',
            ];


            }
            
            
            foreach ($locales as $locale) {
                $roles['name_' . $locale] = 'required';
                $roles['description_' . $locale] = 'required';
            }
            
             $this->validate($request, $roles);

            
            $products= Product::findOrFail($id) ;
            
            foreach ($locales as $locale) 
            {
                $products->translateOrNew($locale)->name = $request->get('name_' . $locale);
                $products->translateOrNew($locale)->description = $request->get('description_' . $locale);
            }        


            $products->company_id= $request->company_id;
            $products->price= $request->price;
            $products->discount= $request->discount;
            $products->quentity= $request->quentity;
            if($request->slider){
            $products->slider= $request->slider;}else{$products->slider= 0;}
            if($request->homepage){
            $products->home_page= $request->homepage;}else{$products->home_page= 0;}

             if(Input::file("image")&&Input::file("image")!=NULL)
                    {
                        if (Input::file("image")->isValid()) 
                            {
                                $destinationPath=public_path('uploads/products');
                                
                                $extension=strtolower(Input::file("image")->getClientOriginalExtension());
                                //dd($extension);
                                $array= $this->image_extensions();
                                if(in_array($extension,$array))
                                {
                                    $fileName=uniqid().'.'.$extension;
                                    Input::file("image")->move($destinationPath, $fileName);
                                }
                            }
                    }

            if(isset($fileName)){$products->image='uploads/products/'.$fileName;}

            $products->save();

            return back()->with('success','Edit Product Successfully');
           
    }


   
}





