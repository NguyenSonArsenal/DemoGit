<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Closure;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //protected $adminLoginPath = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }


    // return form login
    function showFormLogin()
    {
        return view('login');
    }


    function checkLogin(Request $request)
    {

        $check = Auth::check();

        //var_dump($check);

        if ($check == true) {

            return 'ok login';

        } else {

            return redirect()->route('login');

        }

    }


    /**
     * Get data form form_login then  login
     *
     * @return If login success then redirect admin page else redirect to login page with errors
     */
    function postLogin(Request $request)
    {

       //dd($request->all()); // ok
       
        $messages = [
            'required'      => 'Trường :attribute bắt buộc nhập.',
        ];

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',

        ], $messages);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user(); // obj 

            $role_id = $user->role_id;

            if($role_id == '1') {
                return redirect()->route('betting.index');
            } else {
                return redirect()->route('user');
            }

        } else {
            
            return redirect()->route('login')->withErrors($validator)->withInput();

        }

    }




    function logout() {

        Auth::logout();
    
        return redirect()->route('login');

    }


}
