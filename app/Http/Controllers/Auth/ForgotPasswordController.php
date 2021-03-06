<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Psy\Util\Json;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


// protected $constant;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(ConstantController $constant)
    // {
    //     $this->constant = $constant;
    //     $this->middleware('guest');
    // }
    
     public function mainResponse($status, $message, $data, $code, $key)
   {
    try {
        $result['status'] = $status;
        $result['code'] = $code;
        $result['message'] = $message;
        if (!is_null($data)) {
            if ($status) {
                if ($data != null && array_key_exists('data', $data)) {
                    $result[$key] = $data['data'];
                } else {
                    $result[$key] = $data;
                }
            } else {
                $result[$key] = $data;
            }
        }
        return response()->json($result, $code);
    } catch (Exception $ex) {
        return response()->json([
            'line' => $ex->getLine(),
            'message' => $ex->getMessage(),
            'getFile' => $ex->getFile(),
            'getTrace' => $ex->getTrace(),
            'getTraceAsString' => $ex->getTraceAsString(),
        ], $code);
    }
}

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getResetToken(Request $request)
    {
         $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = $errors->toArray();
                $message = '';
                foreach ($errors as $key => $value) {
                    $message .= $value[0] . ',';
                }
                return mainResponse(false, $message, null, 203, 'data');
            }
        if ($request->wantsJson()) { // accept Json header
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                return $this->mainResponse(false, trans('passwords.user'), null, 400,'user');
            }
            $token = $this->broker()->createToken($user);
            //$url = url('/password/reset/' . $token);
            $user->notify(new ResetPassword($token));
            $message = (app()->getLocale() == 'ar') ? 'تم إرسال رابط تعيين كلمة المرور للبريد الإلكتروني المدخل' : 'Reset password link have been sent to your email address';
           
            return $this->mainResponse(true, $message, null, 200,'user');
        }else{
         $message = (app()->getLocale() == 'ar') ? ' البريد الإلكتروني المدخل غير مسجل  ' : 'We cant find a user with that e-mail address';
            return $this->mainResponse(false, $message, null, 203,'user');
        }
    }
}