<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\ConstantController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Psy\Util\Json;
use Mockery\Exception;
use Hash;
use DB;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\User;
use App\Models\Token;

class UserController extends Controller
{

    // public function getAccessToken(Request $request)
    //   {

    //       try {
    //           $url = url('/oauth/token');
    //           $headers = ['Accept' => 'application/json'];
    //           $http = new Client();
    //           $response = $http->post($url, [
    //               'headers' => $headers,
    //               'form_params' => [
    //                   'grant_type' => 'password',
    //                   'client_id' => 3,
    //                   'client_secret' => 'RAesX7wO4N65G2BwEijHKGVfcSMzHWu4D3Odzcfy',
    //                   'username' => $request->get('email'),
    //                   'password' => $request->get('password'),
    //                   'scope' => '',
    //               ],
    //           ]);
    //           $data = json_decode((string)$response->getBody(), true);
    //           $user = User::query()->where(['email' => $request->get('email')])->first();

    //           $user->access_token = $data['access_token'];
    //           $message =  (app()->getLocale() == 'ar') ? 'نجحت عملية التسجيل' : 'success';
    //           return mainResponse(true, $message, $user, 200, 'data');
    //       } catch (Exception $e) {
    //           return mainResponse(false, $e->getMessage(), [], $e->getCode(), 'data');
    //       } catch (RequestException $requestException) {
    //           $error=__('errors.RequestException');
    //           return mainResponse(false, $error, [], 203,'data');
    //       }
    //   }



    public function login(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'mobile' => 'required',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = $errors->toArray();
                $message = '';
                foreach ($errors as $key => $value) {
                    $message .= $value[0] . ',';
                }
                return mainResponse(false, $message, null, 203, 'items');
            }
            if(Auth::once(['mobile' => request('mobile'), 'password' => request('password') ]))
            {
                $user = Auth::user();
                if($user->verification != 1){
                    $message =  (app()->getLocale() == 'ar') ? 'الحساب غير مفعل' : 'The account not verified';
                    return mainResponse(true, $message, null, 203, 'data');
                }else{
                    $user['token'] =  $user->createToken('mobile')->accessToken;
                    $message =  (app()->getLocale() == 'ar') ? ' نجحت عملية التسجيل' : 'success';
                    return mainResponse(true, $message, $user, 200, 'data');
                }
            }

            else
            {
                $message =  (app()->getLocale() == 'ar') ? ' فشل تسجيل الدخول البريد الالكتروني او كلمة السر غير متطابقة' : 'The mobile or password not match';
                return mainResponse(false, $message, [], 201, 'items');
            }
        } catch (Exception $e) {
            return mainResponse(false, $e->getMessage(), [], $e->getCode(), 'items');
        }
    }



    public function register(Request $request)
    {
          
          $confirmation_code = 11111;

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'mobile' => 'required|min:8|unique:users',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = $errors->toArray();
                $message = '';
                foreach ($errors as $key => $value) {
                    $message .= $value[0] . ',';
                }
                return mainResponse(false, $message, null, 203, 'items');
            }

            $user = User::query()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'profile_image' => 'uploads/users/avatar.png',
                'password' => bcrypt($request->get('password')),
                'verification' => 0,
                'code' => 1,
                'user_type' => 0,

                // 'profile_image' => $profile_image,
            ]);

            if ($user) {

                return $this->sendVerificationCode($request);

            }
            $error=__('errors.user_not_created');
            return mainResponse(false, $error, null, 203, 'items');
        } catch (RequestException $e) {
            return mainResponse(false, $e->getMessage(), null, $e->getCode(), 'items');
        } catch (ValidationException $e) {
            return mainResponse(false, $e->getMessage(), null, $e->getCode(), 'items');
        } catch (Exception $e) {
            return mainResponse(false, $e->getMessage(), null, $e->getCode(), 'items');
        }
    }

    public function join_driver(Request $request)
    {
        $confirmation_code = 11111;
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'mobile' => 'required|min:8|unique:users',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = $errors->toArray();
                $message = '';
                foreach ($errors as $key => $value) {
                    $message .= $value[0] . ',';
                }
                return mainResponse(false, $message, null, 203, 'items');
            }

            $user = User::query()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'profile_image' => 'uploads/users/avatar.png',
                'password' => bcrypt($request->get('password')),
                'user_type' => 1,
                'verification' => 0,
                'code' => $confirmation_code ,
            ]);

            if ($user) {
                return $this->sendVerificationCode($request);
            }
            $error=__('errors.user_not_created');
            return mainResponse(false, $error, null, 203, 'items');
        } catch (RequestException $e) {
            return mainResponse(false, $e->getMessage(), null, $e->getCode(), 'items');
        } catch (ValidationException $e) {
            return mainResponse(false, $e->getMessage(), null, $e->getCode(), 'items');
        } catch (Exception $e) {
            return mainResponse(false, $e->getMessage(), null, $e->getCode(), 'items');
        }
    }


    public function sendVerificationCode(Request $request)
    { 
        try {
            $confirmation_code = str_random(5);
            $message = (app()->getLocale() == 'ar') ? 'رمز التحقق الخاص بك هو' : 'verification code confirmed successfully';
            $data['message'] = $confirmation_code . ' Your verification code is  رمز التحقق الخاص بك هو ';
            $request->request->add($data);
            $send = $this->sendSMS($request->get('mobile'), $data['message']);
            //return $request->get('mobile');
             if ($send['id']) {
             //return 0;
            $user = User::query()->where('mobile', $request->get('mobile'))->first();
            //return $user;
            $user->code = $confirmation_code;
            $user->verification = 0;
            $user->save();

            $message = (app()->getLocale() == 'ar') ? 'لقد تم ارسال رمز التحقق الى رقمك' : 'verification code has sent to your phone';
            return mainResponse(true, $message, null, 200, 'items');
            }
        } catch (Exception $e) {
            return mainResponse(false, $e->getMessage(), null , $e->getCode(), 'items');
        }
    }




    public function verify(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'code' => 'required',
                'mobile' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = $errors->toArray();
                $message = '';
                foreach ($errors as $key => $value) {
                    //$message .= $value[0] . PHP_EOL;
                    $message .= $value[0] . ',';
                }
                return mainResponse(false, $message, null, 203, 'items');
            }
            $user = User::query()->where('mobile', $request->get('mobile'))->first();

            if ((!is_null($user)) && ($user->code == $request->get('code'))) {
                $user->verification = 1;
                $user->save();

                //return $this->login($request);
                $message = (app()->getLocale() == 'ar') ? 'تم تأكيد رمز التحقق' : 'verification code confirmed successfully';
                return mainResponse(true, $message, null, 200, 'items');
            } else {
                $message = (app()->getLocale() == 'ar') ? 'رمز التحقق الذي قمت بإدخاله غير صحيح' : 'verification code does not match';
                return mainResponse(false, $message, null, 203, 'items');

            }
        } catch (Exception $e) {
            return mainResponse(false, $e->getMessage(), null, $e->getCode(),'items');
        }
    }



    public function sendSMS($mobile, $bodySMS)
    {
    $mobils = $mobile;
    $c= "CLX";
    $b = $bodySMS;
   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.clxcommunications.com/xms/v1/khafayf32/batches",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"from\": \"CLX\",\n\"to\": [\"$mobils\"],\n\"body\": \"$b\" }",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer b924615be3db46a5be017e338d9bc0db",
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 5c708560-b21f-4bf6-56b2-75d047b6be64"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return "cURL Error #:" . $err;
} else {
  $response =json_decode($response, true);
  return $response;
}

}







    public function logout(Request $request)
    {
        if (auth('api')->user()->token()->revoke()) {
            return mainResponse(true, 'logged out successfully', null, 200, 'data');
        } else {
            return mainResponse(false, 'something went wrong', null, 203, 'data');
        }
    }

    public function get_user_data()
    {
        $id = auth('api')->id();
        $user = User::query()->findOrFail($id);
        $user['access_token']= $user->createToken('mobile')->accessToken;
        return mainResponse(true, 'success', $user, 200, 'data');
    }

    // public function show($id)
    // {
    //     $user = User::query()->findOrFail($id);
    //     return response()->json($user);
    // }

    public function update(Request $request)
    {

        $id = auth('api')->id();
        //return $id;
        $user = User::query()->findOrFail($id);
        $rules = [
            'name'=> 'required|min:1',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile' => 'required|min:8|unique:users,mobile,'.$user->id,
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = $errors->toArray();
            $message = '';
            foreach ($errors as $key => $value) {
                $message .= $value[0] . ',';
            }
            return mainResponse(false, $message, null, 203, 'data');
        }


        if($request->profile_image){
            $profile_image = '';
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $path = $image->store('/uploads/users');
                $profile_image = $path;
            }
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        if($request->profile_image){
            $user->profile_image = $profile_image;}



        if ($user->save()) {
            $user->refresh();
            $user->toArray();

            $user['access_token']= $user->createToken('mobile')->accessToken;

            $error=__('errors.data_update');

            return mainResponse(true, $error, $user, 200, 'data');
        }

        $error=__('errors.not_update');
        return mainResponse(false, $error, null, 203, 'data');
    }

    public function reset_password(Request $request)
    {
        $id = auth('api')->id();
        $user = User::query()->findOrFail($id);
        $rules['old_password'] = 'required';
        $rules['new_password'] = 'required|min:6';
        $rules['confirm_new_password'] = 'required|same:new_password|min:6';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = $errors->toArray();
            $message = '';
            foreach ($errors as $key => $value) {
                $message .= $value[0] . ',';
            }
            return mainResponse(false, $message, null, 203, 'data');
        }



        if(Hash::check($request->get('old_password'), $user->password)){
            $user->password = bcrypt($request->get('new_password')) ;
        } else {
            $message = __('errors.password_same');
            return mainResponse(false, $message, null, 200, 'data');
        }

        if ($user->save()) {
            $user->refresh();

            $error=__('errors.password_update');
            return mainResponse(true, $error, null, 200, 'data');
        }

        $error=__('errors.not_update');
        return mainResponse(false, $error, null, 203, 'data');


    }


    // type 1 android 2 ios
  public function fcm_token(Request $request)
    {
        //return $request->all();
        $user_id = auth('api')->id();

         $validator = Validator::make($request->all(), [
                'token'=>'required',
                'type'=>'required',
            ]);

        
            if ($validator->fails()) 
            {
                $errors = $validator->errors();
                $errors = $errors->toArray();
                $message = '';
                foreach ($errors as $key => $value) {
                    $message .= $value[0] . ',';
                }
                return mainResponse(false, $message , null, 203, 'data');
            }
            

           Token::query()->updateOrCreate(
            ['token' => $request->token,
            'user_id' => auth('api')->id() 
            ],
            [
                 
                'type' => $request->type
            ]);
           
             $message = __('errors.sucess_send'); 
                return mainResponse(true, $message , null, 200, 'data');
            

    }  





}