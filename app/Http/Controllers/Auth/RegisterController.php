<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile'=>['required'],
            'gender'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile'=>$data['mobile'],
            'gender'=>$data['gender'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function UniqueEmail(Request $request)
    {
        // return $request;
        # code...
            // return response()->json(['dsfdsf'=>$request->name]);
            $users=User::where('email',$request->email)->first();
            // return $users;
               // $color=Color::where('name',$request->name)->first();
              if(isset($users)){
               
                  return json_encode(false);
              }
              else
                   Return json_encode(true);
    }

    // public function showRegistrationForm()
    // {
    //     return view('layout/front/auth/register');
    // }


    // public function register(Request $request)
    // {
    //     # code...
    //     dd($request);
    // }

}
