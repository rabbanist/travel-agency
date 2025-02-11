<?php

use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBlogCategoryController;
use App\Http\Controllers\Admin\AdminCounterItemController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminWelcomeItemController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminTeamMemberController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/team', [FrontendController::class, 'team_members'])->name('team');
Route::get('/team-member/{slug}', [FrontendController::class, 'team_member'])->name('team.member');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/post/{slug}', [FrontendController::class, 'post'])->name('post');
Route::get('/category/{slug}',[FrontendController::class,'category'])->name('category');
Route::get('/destinations', [FrontendController::class, 'destinations'])->name('destinations');
Route::get('/destination/{slug}', [FrontendController::class, 'destination'])->name('destination');
Route::get('/package/{slug}', [FrontendController::class, 'package'])->name('package');


//User Authentication Routes
Route::get('/registration', [FrontendController::class, 'registration'])->name('registration');
Route::post('/registration', [FrontendController::class, 'registrationSubmit'])->name('registration.submit');
Route::get('/registration/verify-email/{email}/{token}', [FrontendController::class, 'verifyEmail'])->name('registration_verify_email');
Route::get('/login', [FrontendController::class, 'login'])->name('login');
Route::post('/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
Route::get('/forget-password', [FrontendController::class, 'forgetPassword'])->name('forget-password');
Route::post('/forget-password', [FrontendController::class, 'forgetPasswordSubmit'])->name('forget-password.submit');
Route::get('/reset-password/{token}/{email}', [FrontendController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password/{token}/{email}', [FrontendController::class, 'resetPasswordSubmit'])->name('reset-password.submit');

//User Profile Routes
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'profileUpdate'])->name('user.profile.update');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});
//Admin
Route::prefix('admin')->middleware('admin')->group( function (){
    Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile',[AdminDashboardController::class, 'profile'])->name('admin.profile');
    Route::post('/profile',[AdminDashboardController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::get('/logout',[AdminDashboardController::class, 'logout'])->name('admin.logout');


    //Slider Routes
    Route::get('/slider',[AdminSliderController::class, 'index'])->name('admin.slider.index');
    Route::get('/slider/create',[AdminSliderController::class, 'create'])->name('admin.slider.create');
    Route::post('/slider/create',[AdminSliderController::class, 'store'])->name('admin.slider.store');
    Route::get('/slider/edit/{id}',[AdminSliderController::class, 'edit'])->name('admin.slider.edit');
    Route::post('/slider/edit/{id}',[AdminSliderController::class, 'update'])->name('admin.slider.update');
    Route::get('/slider/delete/{id}',[AdminSliderController::class, 'delete'])->name('admin.slider.delete');

    //Welcome Item Routes
    Route::get('/welcome-item',[AdminWelcomeItemController::class, 'index'])->name('admin.welcome-item.index');
    Route::post('/welcome-item/update}',[AdminWelcomeItemController::class, 'update'])->name('admin.welcome-item.update');

    //Feature Routes
    Route::get('/feature',[AdminFeatureController::class, 'index'])->name('admin.feature.index');
    Route::get('/feature/create',[AdminFeatureController::class, 'create'])->name('admin.feature.create');
    Route::post('/feature/create',[AdminFeatureController::class, 'store'])->name('admin.feature.store');
    Route::get('/feature/edit/{id}',[AdminFeatureController::class, 'edit'])->name('admin.feature.edit');
    Route::post('/feature/edit/{id}',[AdminFeatureController::class, 'update'])->name('admin.feature.update');
    Route::get('/feature/delete/{id}',[AdminFeatureController::class, 'delete'])->name('admin.feature.delete');

    //Counter Item Routes
    Route::get('/counter-item',[AdminCounterItemController::class, 'index'])->name('admin.counter-item.index');
    Route::post('/counter-item/update',[AdminCounterItemController::class, 'update'])->name('admin.counter-item.update');

    //Testimonial Routes
    Route::get('/testimonial',[AdminTestimonialController::class, 'index'])->name('admin.testimonial.index');
    Route::get('/testimonial/create',[AdminTestimonialController::class, 'create'])->name('admin.testimonial.create');
    Route::post('/testimonial/create',[AdminTestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::get('/testimonial/edit/{id}',[AdminTestimonialController::class, 'edit'])->name('admin.testimonial.edit');
    Route::post('/testimonial/edit/{id}',[AdminTestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::get('/testimonial/delete/{id}',[AdminTestimonialController::class, 'delete'])->name('admin.testimonial.delete');

    //Team Member Routes
    Route::get('/team-member',[AdminTeamMemberController::class, 'index'])->name('admin.team_member.index');
    Route::get('/team-member/create',[AdminTeamMemberController::class, 'create'])->name('admin.team_member.create');
    Route::post('/team-member/create',[AdminTeamMemberController::class, 'store'])->name('admin.team_member.store');
    Route::get('/team-member/edit/{id}',[AdminTeamMemberController::class, 'edit'])->name('admin.team_member.edit');
    Route::post('/team-member/edit/{id}',[AdminTeamMemberController::class, 'update'])->name('admin.team_member.update');
    Route::get('/team-member/delete/{id}',[AdminTeamMemberController::class, 'delete'])->name('admin.team_member.delete');

    //FAQ Routes
    Route::get('/faq',[AdminFaqController::class, 'index'])->name('admin.faq.index');
    Route::get('/faq/create',[AdminFaqController::class, 'create'])->name('admin.faq.create');
    Route::post('/faq/create',[AdminFaqController::class, 'store'])->name('admin.faq.store');
    Route::get('/faq/edit/{id}',[AdminFaqController::class, 'edit'])->name('admin.faq.edit');
    Route::post('/faq/edit/{id}',[AdminFaqController::class, 'update'])->name('admin.faq.update');
    Route::get('/faq/delete/{id}',[AdminFaqController::class, 'delete'])->name('admin.faq.delete');

    //Blog Category Routes
    Route::get('/blog-category',[AdminBlogCategoryController::class, 'index'])->name('admin.blog_category.index');
    Route::get('/blog-category/create',[AdminBlogCategoryController::class, 'create'])->name('admin.blog_category.create');
    Route::post('/blog-category/create',[AdminBlogCategoryController::class, 'store'])->name('admin.blog_category.store');
    Route::get('/blog-category/edit/{id}',[AdminBlogCategoryController::class, 'edit'])->name('admin.blog_category.edit');
    Route::post('/blog-category/edit/{id}',[AdminBlogCategoryController::class, 'update'])->name('admin.blog_category.update');
    Route::get('/blog-category/delete/{id}',[AdminBlogCategoryController::class, 'delete'])->name('admin.blog_category.delete');

    //Blog Post Routes
    Route::get('/blog-post',[AdminPostController::class, 'index'])->name('admin.blog_post.index');
    Route::get('/blog-post/create',[AdminPostController::class, 'create'])->name('admin.blog_post.create');
    Route::post('/blog-post/create',[AdminPostController::class, 'store'])->name('admin.blog_post.store');
    Route::get('/blog-post/edit/{id}',[AdminPostController::class, 'edit'])->name('admin.blog_post.edit');
    Route::post('/blog-post/edit/{id}',[AdminPostController::class, 'update'])->name('admin.blog_post.update');
    Route::get('/blog-post/delete/{id}',[AdminPostController::class, 'delete'])->name('admin.blog_post.delete');


    //Destination Routes
    Route::get('/destination',[AdminDestinationController::class, 'index'])->name('admin.destination.index');
    Route::get('/destination/create',[AdminDestinationController::class, 'create'])->name('admin.destination.create');
    Route::post('/destination/create',[AdminDestinationController::class, 'store'])->name('admin.destination.store');
    Route::get('/destination/edit/{id}',[AdminDestinationController::class, 'edit'])->name('admin.destination.edit');
    Route::post('/destination/edit/{id}',[AdminDestinationController::class, 'update'])->name('admin.destination.update');
    Route::get('/destination/delete/{id}',[AdminDestinationController::class, 'delete'])->name('admin.destination.delete');

    //Destination Photo Routes
    Route::get('/destination-photo/{id}',[AdminDestinationController::class, 'destinationPhotos'])->name('admin.destination_photo');
    Route::post('/destination-photo/{id}',[AdminDestinationController::class, 'destinationPhotosStore'])->name('admin.destination_photo.store');
    Route::get('/destination-photo/delete/{id}',[AdminDestinationController::class, 'destinationPhotosDelete'])->name('admin.destination_photo.delete');

    //Destination Video Routes
    Route::get('/destination-video/{id}',[AdminDestinationController::class, 'destinationVideos'])->name('admin.destination_video');
    Route::post('/destination-video/{id}',[AdminDestinationController::class, 'destinationVideoStore'])->name('admin.destination_video.store');
    Route::get('/destination-video/delete/{id}',[AdminDestinationController::class, 'destinationVideoDelete'])->name('admin.destination_video.delete');

    //Package Routes
    Route::get('/package',[AdminPackageController::class, 'index'])->name('admin.package.index');
    Route::get('/package/create',[AdminPackageController::class, 'create'])->name('admin.package.create');
    Route::post('/package/create',[AdminPackageController::class, 'store'])->name('admin.package.store');
    Route::get('/package/edit/{id}',[AdminPackageController::class, 'edit'])->name('admin.package.edit');
    Route::post('/package/edit/{id}',[AdminPackageController::class, 'update'])->name('admin.package.update');
    Route::get('/package/delete/{id}',[AdminPackageController::class, 'delete'])->name('admin.package.delete');

    //Package Amenity Routes
    Route::get('/package-amenity/{id}',[AdminPackageController::class, 'packageAmenities'])->name('admin.package_amenity');
    Route::post('/package-amenity/{id}',[AdminPackageController::class, 'packageAmenitiesStore'])->name('admin.package_amenity.store');
    Route::get('/package-amenity/delete/{id}',[AdminPackageController::class, 'packageAmenitiesDelete'])->name('admin.package_amenity.delete');

    //Package Itinerary Routes
    Route::get('/package-itinerary/{id}',[AdminPackageController::class, 'packageItineraries'])->name('admin.package_itinerary');
    Route::post('/package-itinerary/{id}',[AdminPackageController::class, 'packageItinerariesStore'])->name('admin.package_itinerary.store');
    Route::get('/package-itinerary/delete/{id}',[AdminPackageController::class, 'packageItinerariesDelete'])->name('admin.package_itinerary.delete');

//    Package Photos Routes
    Route::get('/package-photo/{id}',[AdminPackageController::class, 'packagePhotos'])->name('admin.package_photo');
    Route::post('/package-photo/{id}',[AdminPackageController::class, 'packagePhotosStore'])->name('admin.package_photo.store');
    Route::get('/package-photo/delete/{id}',[AdminPackageController::class, 'packagePhotosDelete'])->name('admin.package_photo.delete');


    // Amenities Routes
    Route::get('/amenity',[AdminAmenityController::class, 'index'])->name('admin.amenity.index');
    Route::get('/amenity/create',[AdminAmenityController::class, 'create'])->name('admin.amenity.create');
    Route::post('/amenity/create',[AdminAmenityController::class, 'store'])->name('admin.amenity.store');
    Route::get('/amenity/edit/{id}',[AdminAmenityController::class, 'edit'])->name('admin.amenity.edit');
    Route::post('/amenity/edit/{id}',[AdminAmenityController::class, 'update'])->name('admin.amenity.update');
    Route::get('/amenity/delete/{id}',[AdminAmenityController::class, 'delete'])->name('admin.amenity.delete');

});

//Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/forget-password', [AdminAuthController::class, 'forgetPassword'])->name('admin.forget-password');
    Route::post('/forget-password', [AdminAuthController::class, 'forgetPasswordSubmit'])->name('admin.forget-password.submit');
    Route::get('/reset-password/{token}/{email}', [AdminAuthController::class, 'resetPassword'])->name('admin.reset-password');
    Route::post('/reset-password/{token}/{email}', [AdminAuthController::class, 'resetPasswordSubmit'])->name('admin.reset-password.submit');
});
