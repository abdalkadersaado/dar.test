<?php

namespace App\Http\Controllers\Frontend\Auth;

use toastr;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dar-alnuzum';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $services = Service::get();
        return view('frontend.auth.login', compact('services'));
    }

    public function username()
    {
        return 'username';
    }

    protected function authenticated(Request $request, $user)
    {

        if ($user->status == 1) {
            if ($user->status_password == 0) {
                toastr()->info(__("Frontend/general.logged_in_and_change_password"));
                return redirect()->route('users.edit_password');
            } else {
                toastr()->success('Logged in successfully.');
                return redirect()->route('dar.home');
            }
        }

        return redirect()->route('dar.home')->with([
            'error' => 'Please contact with Dar-AlNuzum ',
            'alert-type' => 'warning'
        ]);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        // dd($provider, $socialUser);

        $token = $socialUser->token;
        $id = $socialUser->getId();
        $nickName = $socialUser->getNickname();
        $name = $socialUser->getName();
        $email = $socialUser->getEmail() == '' ? trim(Str::lower(Str::replaceArray(' ', ['_'], $name))) . '@' . $provider . '.com' : $socialUser->getEmail();
        $avatar = $socialUser->getAvatar();

        $user = User::firstOrCreate([
            'email' => $email
        ], [
            'name' => $name,
            'username' => $nickName != '' ? $nickName : trim(Str::lower(Str::replaceArray(' ', ['_'], $name))),
            'email' => $email,
            'email_verified_at' => Carbon::now(),
            'mobile' => $id,
            'status' => 1,
            'receive_email' => 1,
            'remember_token' => $token,
            'password' => Hash::make($email),
        ]);

        if ($user->user_image == '') {
            $filename = '' . $user->username . '.jpg';
            $path = public_path('/assets/users/' . $filename);
            Image::make($avatar)->save($path, 100);
            $user->update(['user_image' => $filename]);
        }
        $user->attachRole(Role::whereName('user')->first()->id);

        Auth::login($user, true);

        return redirect()->route('users.dashboard')->with([
            'message' => 'Logged in successfully',
            'alert-type' => 'success'
        ]);
    }
}
