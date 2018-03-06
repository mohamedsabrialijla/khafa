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
use App\Models\Company;
use App\Models\CompanyTranslations;




class CompanyController extends Controller
{
   


    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp');

    }


    public function index(Request $request)
    {
        $company = Company::orderBy('id', 'desc')->get();
        //return $products;

        $locales = Language::all();

        return view('admin.company.home', [
            'company' => $company,
            'locales' => $locales,
        ]);
    }


    public function create(){
        $locales = Language::all();
        return view('admin.company.create',['locales'=>$locales]);
    }

    public function store(Request $request){

        //dd($request->all());

         $locales = Language::all()->pluck('lang');
            $roles = [
                'image'=>'image|mimes:jpg,png,jpeg,gif,bmp|max:5000',
            ];
            
            
            foreach ($locales as $locale) {
                $roles['name_' . $locale] = 'required';
                $roles['description_' . $locale] = 'required';
            }
            
             $this->validate($request, $roles);

            
            $company= New Company;
            
            foreach ($locales as $locale) 
            {
                $company->translateOrNew($locale)->name = $request->get('name_' . $locale);
                $company->translateOrNew($locale)->description = $request->get('description_' . $locale);
            }        


             if(Input::file("logo")&&Input::file("logo")!=NULL)
                    {
                        if (Input::file("logo")->isValid()) 
                            {
                                $destinationPath=public_path('uploads/company');
                                
                                $extension=strtolower(Input::file("logo")->getClientOriginalExtension());
                                //dd($extension);
                                $array= $this->image_extensions();
                                if(in_array($extension,$array))
                                {
                                    $fileName=uniqid().'.'.$extension;
                                    Input::file("logo")->move($destinationPath, $fileName);
                                }
                            }
                    }

            if(isset($fileName)){$company->logo='uploads/company/'.$fileName;}

            $company->save();

            return back()->with('success','The Company Save Successfully');


    }

    
    public function destroy($id)
    {
        //dd($id);
        $company = Company::query()->findOrFail($id);
        if ($company->delete()) {
            CompanyTranslations::where('company_id',$id)->delete();
            return 'success';
        }
        return 'fail';
    }


    public function edit($id)
    {
        $locales = Language::all();
        $company = Company::findOrFail($id);

        return view('admin.company.edit',['locales'=>$locales,'company'=>$company]);
    }

    public function update(Request $request, $id)
    {
        $locales = Language::all()->pluck('lang');
            $roles = [
                
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


             $company = Company::findOrFail($id);

            
            
            foreach ($locales as $locale) 
            {
                $company->translateOrNew($locale)->name = $request->get('name_' . $locale);
                $company->translateOrNew($locale)->description = $request->get('description_' . $locale);
            }        


           
             if(Input::file("logo")&&Input::file("logo")!=NULL)
                    {
                        if (Input::file("logo")->isValid()) 
                            {
                                $destinationPath=public_path('uploads/company');
                                
                                $extension=strtolower(Input::file("logo")->getClientOriginalExtension());
                                //dd($extension);
                                $array= $this->image_extensions();
                                if(in_array($extension,$array))
                                {
                                    $fileName=uniqid().'.'.$extension;
                                    Input::file("logo")->move($destinationPath, $fileName);
                                }
                            }
                    }

            if(isset($fileName)){$company->logo='uploads/company/'.$fileName;}

            $company->save();

            return back()->with('success','Edit company Successfully');
           
    }


   
}





