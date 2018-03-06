<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewPostNotification;

use App\User;
use App\Models\Language;
use App\Models\Help;
use App\Models\HelpTranslation;

class HelpController extends Controller
{
   


    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp','pdf','txt','docx','doc','ppt','xls','zip','rar');

    }


    public function index(Request $request)
    {
        $locales = Language::all();
        $helps = Help::where('id','>',0);
        $helps = $helps->orderBy('id', 'desc')->get();

        return view('admin.helps.home', [
            'helps' => $helps,
            'locales' => $locales,
            
        ]);
    }

    public function create()
    {
        $locales = Language::all();
        $helps = Help::all();
        return view('admin.helps.create',['helps'=>$helps,'locales'=>$locales]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $locales = Language::all()->pluck('lang');
            $roles = [
                // 'type_orginal' => 'required',
                // 'teachers' => 'required',
                // 'supervisors' => 'required',
            ];

            foreach ($locales as $locale) {
                $roles['question_' . $locale] = 'required';
                $roles['answer_' . $locale] = 'required';
            }
             $this->validate($request, $roles);

            
            $nurserys= New Help ;

            foreach ($locales as $locale) 
            {
                $nurserys->translateOrNew($locale)->question = $request->get('question_' . $locale);
                $nurserys->translateOrNew($locale)->answer = $request->get('answer_' . $locale);
            }        



                $nurserys->save();


                 return back()->with('success','Saved Successfully');
               

           
          
        //   return back()->with('success','تم الحفظ بنجاح');
           
    }

    
    public function destroy($id)
    {
        //dd($id);
        $issue = Help::query()->findOrFail($id);
        if ($issue->delete()) {
            HelpTranslation::where('help_id',$id)->delete();
            return 'success';
        }
        return 'fail';
    }


    public function edit(Request $request, $id)
    {
        //dd($request->status);
        $locales = Language::all();
        $helps = Help::findOrFail($id);
        
        return view('admin.helps.edit',[
            'helps'=>$helps,
            'locales'=>$locales
            ]);
    }

    public function update(Request $request, $id)
    {
         //dd($request->all());
        // dd($request->all());

        $locales = Language::all()->pluck('lang');
            $roles = [
                // 'type_orginal' => 'required',
                // 'teachers' => 'required',
                // 'supervisors' => 'required',
            ];

            foreach ($locales as $locale) {
                $roles['question_' . $locale] = 'required';
                $roles['answer_' . $locale] = 'required';
            }
             $this->validate($request, $roles);

            
            $nurserys= Help::findOrFail($id) ;

            foreach ($locales as $locale) 
            {
                $nurserys->translateOrNew($locale)->question = $request->get('question_' . $locale);
                $nurserys->translateOrNew($locale)->answer = $request->get('answer_' . $locale);
            }        



                $nurserys->save();


                 return back()->with('success','Edit Successfully');
               

           
           
    }

    


   
}
