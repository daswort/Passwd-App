<?php
 
class UserController extends BaseController {

	public function __construct() 
	{
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getHome()
    {
    	return View::make('admin.home');
    	//echo 'Hola'; exit;
    }

    public function getLogin()
    {
    	//echo '<pre>'; print_r(User::isLogged()); echo '</pre>';
        return View::make('public.login');
    }
 
	public function postLogin()
    {
        $input = Input::all();
        $rules = array(
        	'email' => 'required|exists:users',
            'password' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $email = Input::get('email');
        $password = Input::get('password');
        if(!$user = User::where('email', '=', $email)->first()) 
            return Redirect::to('/user/login');
        if(!Hash::check($password, $user->password))
			return Redirect::to('/user/login');
        
        Session::put('user_id', $user->id);
        Session::put('user_email', $user->email);
        Session::put('user_nombre', $user->name);
        
        return Redirect::to('/');
    }

    public function getRegister() 
    {
        return View::make('public.register');
    }

    public function postRegister()
    {
        $input = Input::all();
        $rules = array(
            'nombres_reg' => 'required|alpha',
            'a_paterno_reg' => 'required|alpha',
            'a_materno_reg' => 'alpha',
            'rut_reg' => 'required|rut|unique:users,rut',
            'tel_fijo_reg' => 'required',
            'tel_movil_reg' => 'required',
            'num_cliente_reg' => 'required|servicio|unique:users,num_cliente',
            'contrasena_reg' => 'Required|AlphaNum|Between:6,15',
            'recontrasena_reg' => 'required|same:contrasena_reg',
            'email_reg' => 'required|email|unique:users,email',
        );

        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            return Redirect::to('/user/register')->withErrors($validator)->withInput();
        }
        $user              = new User;
        $user->rut         = Input::get('rut_reg');
        $user->nombres     = mb_convert_case(Input::get('nombres_reg'), MB_CASE_TITLE, 'UTF-8');
        $user->apaterno    = mb_convert_case(Input::get('a_paterno_reg'), MB_CASE_TITLE, 'UTF-8');
        $user->amaterno    = mb_convert_case(Input::get('a_materno_reg'), MB_CASE_TITLE, 'UTF-8');
        $user->tel_fijo    = Input::get('tel_fijo_reg');
        $user->tel_movil   = Input::get('tel_movil_reg');
        $user->num_cliente = Input::get('num_cliente_reg');
        $user->contrasena  = Hash::make(Input::get('contrasena_reg'));
        $user->email       = Input::get('email_reg');
        $user->tipo        = 'CLI';

        $user->save();
        return Redirect::to('/user/login')->with('success', 'Registro completado. Acceda a su cuenta');
    }

    public function getRecover()
    {
        return View::make('public.recover');
    }

    public function postRecover()
    {
        $input = Input::all();
        $rules = array(
            'email'=>'required_without:username|exists:users,email',
            'username'=>'required_without:email|exists:users,username'
        );
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            return Redirect::to('/user/recover')->withErrors($validator)->withInput();
        }

        $user = User::whereEmailOrUsername(Input::get('email'), Input::get('username'))->first();
        //echo '<pre>'; print_r($user->email); exit;
        $credentials = array('email'=>$user->email);
        
        if(Password::remind($credentials, function($message, $user) {
            $message->subject(Lang::get('misc.reset_email_subject'));
        })) {
            return Redirect::to('/user/recover')->with('success', Lang::get('misc.reset_success_msg'));
        }
    }

    public function getReset($token)
    {
        return View::make('public.reset')->with('token', $token);
    }

    public function postReset($token)
    {
        $input = Input::all();
        $rules = array('password'=>'required','repassword'=>'required|same:password');
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $credentials = array(
            'password'=>Input::get('password'), 
            'password_confirmation'=>Input::get('repassword'),
            'token'=>$token,
        );

        Password::reset($credentials, function($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });
        return Redirect::to('/user/login')->with('success', Lang::get('misc.reminder_success_msg'));
    }

    public function logout()
    {
        Session::flush();
    	return Redirect::to('/');
    }
}