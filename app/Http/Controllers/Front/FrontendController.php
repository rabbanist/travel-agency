<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Feature;
use App\Models\Slider;
use App\Models\User;
use App\Models\WelcomeItem;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index(){

        $sliders = Slider::get();
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $features = Feature::get();
        return view('front.pages.home', compact('sliders','welcome_item','features'));
    }

    public function about(){
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $features = Feature::get();
        return view('front.pages.about', compact('welcome_item','features'));
    }

    public function registration(){
        return view('front.pages.register');
    }


    public function registrationSubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'retype_password' => 'required|same:password'
        ]);

        $token = hash('sha256', time());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->token = $token;
        $user->save();

        $verification_link = route('registration_verify_email', ['email' => $user->email, 'token' => $token]);

        $subject = 'User Registration Verification';
        $message = 'Please click on the following link to verify your email: <a href="'.$verification_link.'">Verify Email</a>';
        $message .= "<a href='".$verification_link."'>Click Here</a>";

        \Mail::to($user->email)->send(new Websitemail($subject, $message));

        return redirect()->route('login')->with('success','Registration Successful! Please verify your email to login');
    }

    public function registrationVerifyEmail($email, $token){
        $user = User::where('email', $email)->where('token', $token)->first();
        if(!$user){
            return redirect()->route('login')->with('error', 'Invalid token or email');
        }

        $user->token = '';
        $user->status = 1;
        $user->update();

        return redirect()->route('login')->with('success', 'Email verified successfully. You can login now');
    }

    public function login(){
        return view('front.pages.login');
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userData = $request->all();
        $data = [
            'email' => $userData['email'],
            'password' => $userData['password'],
            'status' => 1
        ];

        if(Auth::guard('web')->attempt($data)){
            return redirect()->route('user.dashboard')->with('success','User Login Successfully' );
        }else{
            return redirect()->back()->with('error','Invalid Email or Password')->withInput();
        }
    }

    public function forgetPassword(){
        return view('front.pages.forget-password');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user) {
            return redirect()->back()->with('error','Email is not found');
        }

        $token = hash('sha256',time());
        $user->token = $token;
        $user->update();

        $reset_link = route('reset-password', ['token' => $token, 'email' => $request->email]);
        $subject = "Password Reset";
        $message = "To reset password, please click on the link below:<br>";
        $message .= "<a href='".$reset_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','We have sent a password reset link to your email. Please check your email. If you do not find the email in your inbox, please check your spam folder.');
    }

    public function resetPassword($token, $email) {
        $user = User::where('email', $email)->where('token', $token)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Token or email is not correct');
        }
        return view('front.pages.reset-password', ['token' => $token, 'email' => $email]);
    }

    public function resetPasswordSubmit(Request $request, $token, $email) {
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $user = User::where('email', $email)->where('token', $token)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Token or email is not correct');
        }

        $user->password = Hash::make($request->password);
        $user->token = "";
        $user->update();

        return redirect()->route('login')->with('success', 'Password reset is successful. You can login now.');
    }
}
