<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendPasswordMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:5120', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required', 'file', 'mimes:jpeg,png,jpg'],
            'gender' => ['required', 'in:مرد,زن'],
            'role' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    

    protected function create(array $data)
    {
        $image = $data['image'];
        $extension = $image->getClientOriginalExtension();
        $imgname = time() . rand(99, 999) . 'pdc imageOf ' . $data['name'] . '.' . $extension;
        $image->move('asset/upload/image', $imgname);
        DB::beginTransaction();
        $user =  User::create([
            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imgname,
            'gender' => $data['gender'],
            'role' => $data['role']
        ]);
        try {
            $maildata = [
                'title' => 'کاربری گرامی حساب کاربری شما از طرف مرکز انکشاف مسلکی برای استفاده از سیستم مرکز انکشاف مسلکی ساخته شد',
                'info' => " رمز زیر زمز عبور شما میباشد، لطفا پس از اولین  بار ورود رمز خود را تبدل نماید ",
                'password' => $data['password'],

            ];
            Mail::to($user->email)->send(new SendPasswordMail($maildata));
            DB::commit();
            session()->flash('message', 'ایجاد حساب کاربری موفقانه صورت گرفت');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('deletemessage', 
            // 'حساب کاربری به دلیل فرستاده نشدن رمز عبور از طریق ایمیل ایجاد  نشد'
            $e->getMessage());

            return redirect(route('register'))->with('deletemessage','حساب کاربری به دلیل فرستاده نشدن رمز عبور از طریق ایمیل ایجاد  نشد');
        }
        return $user;
    }
}
