<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
        // $this->showRegistrationForm();
    }

    public function showRegistrationForm()
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    public function userRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'business_name' => 'required|string|unique:users',
            'category_id' => 'exists:categories,id',
            'address' => 'required|string',
            'vat' => 'required|numeric|digits:11|unique:users',
            'cover' => 'nullable',
        ]);
        // dd($validator);
        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $image_path = Storage::put('users_covers', $data['cover']);
        $data['cover'] = $image_path;
        $user = new User();
        $user->fill($data);
        $user->slug = Str::slug($user->business_name);
        $user->password = Hash::make($user->password);
        $user->save();

        if (isset($data['categories'])) {
            $user->categories()->sync($data['categories']);
        }

        $this->guard()->login($user);

        return redirect()->route('admin.home');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'business_name' => 'required|string',
            'slug' => 'required|string',
            'address' => 'required|string',
            'vat' => 'required|string|digits:11',
            'cover' => 'text',
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
            'password' => Hash::make($data['password']),
            'business_name' => $data['business_name'],
            'slug' => $data['slug'],
            'address' => $data['address'],
            'vat' => $data['vat'],
            'cover' => $data['cover']
        ]);
    }
}
