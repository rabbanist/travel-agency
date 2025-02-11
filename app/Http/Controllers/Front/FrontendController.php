<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BlogCategory;
use App\Models\CounterItem;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Package;
use App\Models\PackageAmenity;
use App\Models\PackageItinerary;
use App\Models\Post;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Destination;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
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
        $team_members = TeamMember::get();
        $testimonials = Testimonial::get();
        $posts = Post::with('blog_category')->orderBy('id','desc')->get()->take(3);
        $destinations = Destination::orderBy('view_count','desc')->get()->take(8);
        return view('front.pages.home', compact('sliders','welcome_item','features','testimonials', 'team_members','posts','destinations'));
    }

    public function about(){
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $features = Feature::get();
        $counter_item = CounterItem::where('id', 1)->first();
        return view('front.pages.about', compact('welcome_item','features','counter_item'));
    }

    public function team_members(){
        $team_members = TeamMember::paginate(20);
        return view('front.pages.team-members', compact('team_members'));
    }

    public function team_member($slug){
        $team_member = TeamMember::where('slug',$slug)->first();
        return view('front.pages.team-member', compact('team_member'));
    }

    public function faq(){
        $faqs = Faq::get();
        return view('front.pages.faq', compact('faqs'));
    }

    // Blog Page Function
    public function blog(){
        $posts = Post::with('blog_category')->orderBy('id','desc')->paginate(9);
        return view('front.pages.blog', compact('posts'));
    }

    public function post($slug)
    {
        $categories = BlogCategory::orderBy('name','asc')->get();
        $post = Post::with('blog_category')->where('slug',$slug)->first();
        $latest_posts = Post::with('blog_category')->orderBy('id','desc')->get()->take(5);
        return view('front.pages.post', compact('post', 'categories', 'latest_posts'));
    }

    public function destinations()
    {
        $destinations = Destination::orderBy('id','asc')->paginate(20);
        return view('front.pages.destinations', compact('destinations'));
    }

    public function destination($slug)
    {
        $destination = Destination::where('slug',$slug)->first();
        $destination->view_count = $destination->view_count + 1;
        $destination->update();

        $destination_photos = DestinationPhoto::where('destination_id',$destination->id)->get();
        $destination_videos = DestinationVideo::where('destination_id',$destination->id)->get();

        return view('front.pages.destination', compact('destination', 'destination_photos', 'destination_videos',));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug',$slug)->first();
        $posts = Post::with('blog_category')->where('blog_category_id',$category->id)->orderBy('id','desc')->paginate(9);
        return view('front.pages.category', compact('posts', 'category'));
    }

    public function package($slug)
    {
        $package = Package::with('destination')->where('slug',$slug)->first();
        $package_amenities_include = PackageAmenity::with('amenity')
            ->where('package_id',$package->id)
            ->where('type','Include')->get();

        $package_amenities_exclude = PackageAmenity::with('amenity')
            ->where('package_id',$package->id)
            ->where('type','Exclude')->get();

        $package_iteneraries = PackageItinerary::where('package_id',$package->id)->get();


        return view('front.pages.package', compact('package', 'package_amenities_include', 'package_amenities_exclude','package_iteneraries'));
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
