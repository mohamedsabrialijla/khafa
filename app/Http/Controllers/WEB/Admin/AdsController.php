<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewPostNotification;

use App\Models\AdsSplash;


class AdsController extends Controller
{
   


    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp','pdf');

    }


    public function index(Request $request)
    {
        $ads = AdsSplash::where('type',1)->get();

        return view('admin.ads.home', [
            'ads' => $ads,
        ]);
    }

    public function index_splash(Request $request)
    {
        $splash = AdsSplash::where('type',2)->get();

        return view('admin.splash.home', [
            'splash' => $splash,
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.ads.create');
    }

    
    public function create_splash(Request $request)
    {
        return view('admin.splash.create');
    }


    public function store(Request $request)
    {
        
       //dd($request->all());
        
        
            $roles = [
                'image' => 'required',
            ];
            
            $this->validate($request, $roles);

            
            $ads= New AdsSplash() ;
            
            if($request->type == 1 )
            {
                if(Input::file("image")&&Input::file("image")!=NULL)
                {
                    if (Input::file("image")->isValid()) 
                        {
                            $destinationPath=public_path('uploads/ads');
                            
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

                if(isset($fileName)){$ads->image='uploads/ads/'.$fileName;}
                $ads->type = 1;
                $ads->save();
            }
            elseif($request->type == 2)
            {
                if(Input::file("image")&&Input::file("image")!=NULL)
                {
                    if (Input::file("image")->isValid()) 
                        {
                            $destinationPath=public_path('uploads/splash');
                            
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

                if(isset($fileName)){$ads->image='uploads/splash/'.$fileName;}
                $ads->type = 2;
                $ads->save();
            }else{
                return back()->with('error','un saved successfully the type not Found');
            }

        return back()->with('success','saved successfully');          
    }

    
    public function destroy($id)
    {
        //dd($id);
        $food = AdsSplash::query()->findOrFail($id);
        if ($food->delete()) {
            return 'success';
        }
        return 'fail';
    }


    public function edit($id)
    {
        $ads = AdsSplash::findOrFail($id);

        return view('admin.ads.edit',['ads'=>$ads]);
    }

    public function edit_splash($id)
    {
        $ads = AdsSplash::findOrFail($id);

        return view('admin.splash.edit',['ads'=>$ads]);
    }

    public function update(Request $request, $id)
    {
         //dd($request->all());
        

         $type = AdsSplash::where('id',$id)->pluck('type')->first();
        //return $type;
        $ads = AdsSplash::findOrFail($id);
         if($type == 1 )
            {
                if(Input::file("image")&&Input::file("image")!=NULL)
                {
                    if (Input::file("image")->isValid()) 
                        {
                            $destinationPath=public_path('uploads/ads');
                            
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

                if(isset($fileName)){$ads->image='uploads/ads/'.$fileName;}
                $ads->type = 1;
                $ads->save();
            }
            elseif($type == 2)
            {
                if(Input::file("image")&&Input::file("image")!=NULL)
                {
                    if (Input::file("image")->isValid()) 
                        {
                            $destinationPath=public_path('uploads/splash');
                            
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

                if(isset($fileName)){$ads->image='uploads/splash/'.$fileName;}
                $ads->type = 2;
                $ads->save();
            }else{
                return back()->with('error','un saved successfully the type not Found');
            }



            
            return back()->with('success','Edit successfully');
           
    }


   
}





