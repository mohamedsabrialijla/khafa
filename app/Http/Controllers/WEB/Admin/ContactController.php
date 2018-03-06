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
use App\Models\Contact;

class ContactController extends Controller
{
   
    public function image_extensions(){

        return array('jpg','png','jpeg','gif','bmp','pdf','txt','docx','doc','ppt','xls','zip','rar');

    }


    public function index(Request $request)
    {

        $contacts = Contact::where('id','>',0)->orderBy('id', 'desc')->get();;

        //dd($contacts);

        return view('admin.contacts.home', [
            'contacts' => $contacts,
        ]);
    }

  
   

    
    public function destroy($id)
    {
        //dd($id);
        $issue = Contact::query()->findOrFail($id);
        if ($issue->delete()) {
            return 'success';
        }
        return 'fail';
    }


    public function edit(Request $request, $id)
    {
        // dd($request->id);
        $contacts = Contact::findOrFail($id);
        
        return view('admin.contacts.edit',[
            'contacts'=>$contacts,
            ]);
    }

  
   
}
