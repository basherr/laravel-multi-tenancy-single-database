<?php

namespace App\Http\Controllers\Auth;

use DB;
use Auth;
use Session;
use Validator;
use App\Role;
use App\User;
use App\Site;
use Orchestra\Support\Facades\Tenanti;
use App\Events\NewSiteWasRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'site_name.required'    => 'Company name is required',
            'site_name.unique'    => 'Company name is already registered',
            'site_name.min'    => 'Company name must be at least 3 characters',
            'site_name.max'    => 'Company name must not be greater then 40 characters',
            'site_name.regex'    => 'Company name must not have extra spaces and special character',
        ];
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'site_name' => 'required|unique:sites|min:3|max:40|regex:/([-_a-z]+\w+\s?)*\s*/i',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return DB::transaction(function() use ($data) {
            
            $role = new Role;
            
            $user = User::create([
                'name' => strtolower($data['name']),
                'email' => strtolower($data['email']),
                'password' => bcrypt($data['password']),
            ]);
            
            $site = Site::create([
                'site_name' => strtolower($data['site_name']),
                'site_slug' => slugify($data['site_name']),
            ]);

            $user->sites()->attach( $site->id );

            $user->roles()->attach( $role->get_builder_role(), array('site_id' => $site->id ) );
            
            event(new NewSiteWasRegistered($site));

            return $user;
        });
    }
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        Session::flush();

        return redirect('/');
    }
}
