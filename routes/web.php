<?php
use App\User;
use App\ContactList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// front side routes
Route::get('/', 'HomeController@index')->middleware('ipAddress')->name('index');
Route::get('contact-us', 'HomeController@contact_us')->name('contactus');
Route::post('contact_submit', 'HomeController@contact_submit')->name('contact_submit');

Route::get('about-us', 'HomeController@about_us')->name('about_us');
Route::get('privacy_policy', 'HomeController@privacy_policy')->name('privacy_policy');

Route::get('craftman', 'HomeController@craftman')->name('craftman');
Route::get('craftman_detail/{id?}', 'HomeController@craftman_detail')->middleware('pagecount')->name('craftman_detail');

Route::get('designer', 'HomeController@designer')->name('designer');
Route::get('designer_detail/{id}', 'HomeController@designer_detail')->name('designer_detail');

Route::get('painter', 'HomeController@painter')->name('painter');
Route::get('painter_detail/{id}', 'HomeController@painter_detail')->name('painter_detail');

Route::get('photographer', 'HomeController@photographer')->name('photographer');
Route::get('photographer_detail/{id}', 'HomeController@photographer_detail')->name('photographer_detail');


Route::get('manufacture_exporter', 'HomeController@manufacture_exporter')->name('manufacture_exporter');
Route::get('manufacture_exporter_detail/{id}', 'HomeController@manufacture_exporter_detail')->name('manufacture_exporter_detail');

Route::post('front/comment', 'HomeController@commentStore')->name('front/comment');
Auth::routes();

Route::get('dashboard/home', 'DashboardController@index')->name('home');

// Route::get('/post', 'PostController@index')->name('post');
// Route::get('/media', 'PostController@media')->name('media');
Route::get('/logout', 'DashboardController@logout')->name('logout');

Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', 'Auth\LoginController@getFrontLogin')->name('login');
    Route::post('/login', ['as' => 'front.auth', 'uses' => 'Auth\LoginController@frontAuth']);
    Route::get('/frontregister', [RegisterController::class,'register'])->name('frontregister');
    Route::post('/singup', [RegisterController::class,'singup'])->name('singup');
    
    //Socialitelogin google
    Route::get('login/google', 'SocialiteController@redirectToProvider')->name('google.login');
    Route::get('login/google/callback', 'SocialiteController@handleProviderCallback')->name('google.login.callback');

    //facebook login
    Route::get('facebook/login', 'SocialiteController@redirectToFacebook')->name('facebook.login');
    Route::get('facebook/callback', 'SocialiteController@handleFacebookCallback')->name('facebook.callback');



    Route::get('blackhole/login', 'Auth\AdminLoginController@getAdminLogin')->name('dashboard.login');
    Route::post('blackhole/login', ['as' => 'admin.auth', 'uses' => 'Auth\AdminLoginController@adminAuth']);

    Route::get('blackhole', 'Auth\AdminLoginController@getAdminLogin')->name('dashboard.login');
    Route::post('blackhole', ['as' => 'admin.auth', 'uses' => 'Auth\AdminLoginController@adminAuth']);

});


Route::group(['middleware' => ['auth']], function() {

    Route::prefix('dashboard')->group(function () {

        Route::resource('roles','RoleController');

        // Users Section
        Route::get('users','UserController@index')->name('users');
        Route::get('users/create','UserController@create')->name('users.create');
        Route::post('users/store','UserController@store')->name('users.store');
        Route::get('users/profile/{id}','UserController@profile')->name('users.profile');
        Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
        Route::post('users/update/{id}','UserController@update')->name('users.update');
        Route::get('users/destroy/{id}','UserController@destroy')->name('users.destroy');
        Route::post('users/get_states','UserController@get_states')->name('users.get_states');
        Route::post('users/get_cities','UserController@get_cities')->name('users.get_cities');

        // Craftmans Section
        Route::get('craftmans','CraftmanController@index')->name('craftmans');
        Route::get('craftmans/new','CraftmanController@new')->name('craftmans.new');
        Route::get('craftmans/create','CraftmanController@create')->name('craftmans.create');
        Route::post('craftmans/store','CraftmanController@store')->name('craftmans.store');
        // Route::get('craftmans/profile/{id}','CraftmanController@profile')->name('craftmans.profile');
        
        Route::get('craftmans/my-profile/{id}','CraftmanController@dashboard')->name('craftmans.my-profile');
        //profile page
        Route::get('craftmans/my-profile/profile/{id}','CraftmanController@profile')->name('craftmans.profile');
        Route::get('craftmans/my-profile/profile/{id}/{user_id}','CraftmanController@profile')->name('craftmans.profile');

        Route::get('craftmans/my-profile/personal-detail/{id}','CraftmanController@personal_detail')->name('craftmans.personal-detail');
        Route::post('craftmans/my-profile/personal_submit/{id}','CraftmanController@personal_submit')->name('craftmans.personal_submit');
        Route::get('craftmans/my-profile/social-detail/{id}','CraftmanController@social_detail')->name('craftmans.social-detail');
        Route::post('craftmans/my-profile/social_submit/{id}','CraftmanController@social_submit')->name('craftmans.social_submit');
        Route::get('craftmans/my-profile/update-password/{id}','CraftmanController@update_password')->name('craftmans.update-password');
        Route::post('craftmans/my-profile/password_submit/{id}','CraftmanController@password_submit')->name('craftmans.password_submit');

        Route::get('craftmans/business-profile/business-detail/{id}','CraftmanController@business_detail')->name('craftmans.business-detail');
        Route::post('craftmans/business-profile/business_submit/{id}','CraftmanController@business_submit')->name('craftmans.business_submit');
        
        
        //Image Gallery Section
        Route::get('craftmans/business-profile/image-gallery/{id}','CraftmanController@image_gallery')->name('craftmans.image-gallery');
        Route::post('craftmans/business-profile/image_submit/{id}','CraftmanController@image_add')->name('craftmans.image_add');
        Route::get('craftmans/business-profile/image_delete/{id}/{image_id}','CraftmanController@image_delete')->name('craftmans.image_delete');
        Route::post('craftmans/business-profile/image_update','CraftmanController@image_update')->name('craftmans.image_update');
        Route::post('craftmans/business-profile/get_image_details','CraftmanController@get_image_details')->name('craftmans.get_image_details');
        

        Route::get('craftmans/business-profile/promotional-video/{id}','CraftmanController@promotional_video')->name('craftmans.promotional-video');
        Route::post('craftmans/business-profile/promotional_submit/{id}','CraftmanController@promotional_add')->name('craftmans.promotional_add');
        Route::get('craftmans/business-profile/delete_promotional/{id}/{promo_id}','CraftmanController@delete_promotional')->name('craftmans.delete_promotional');
        
        //approve account 
        Route::get('craftmans/approve-account/{id}','CraftmanController@approve_account')->name('craftmans.approve_account');

        Route::get('craftmans/business-profile/address/{id}','CraftmanController@address')->name('craftmans.address');
        Route::post('craftmans/business-profile/save-address/{id}','CraftmanController@save_address')->name('craftmans.save_address');


        // craftsman job section
        Route::get('craftmans/jobs/{id}','CraftmanController@jobs')->name('craftmans.jobs');
        Route::get('craftmans/jobs/create/{id}','CraftmanController@job_create')->name('craftmans.job_create');
        Route::post('craftmans/job_store/{id}','CraftmanController@job_store')->name('craftmans.job_store');
        Route::get('craftmans/jobs/edit/{id}/{user_id}','CraftmanController@job_edit')->name('craftmans.job_edit');
        Route::post('craftmans/jobs/job_update/{id}/{user_id}','CraftmanController@job_update')->name('craftmans.job_update');
        Route::get('craftmans/jobs/destroy/{id}/{user_id}','CraftmanController@job_destroy')->name('craftmans.job_a_destroy');
        // Route::get('craftmans/jobs/image_delete/{id}/{user_id}','CraftmanController@job_image_destroy')->name('craftmans.job_image_destroy');


        // New Job Section
        Route::get('craftmans/jobs_a/{id}','CraftmanController@jobs_a')->name('craftmans.jobs_a');
        Route::get('craftmans/jobs_a/create/{id}','CraftmanController@job_a_create')->name('craftmans.job_a_create');
        Route::post('craftmans/job_store_a/{id}','CraftmanController@job_store_a')->name('craftmans.job_store_a');
        Route::get('craftmans/jobs_a/job_preview/{job_id}/{id}','CraftmanController@job_preview')->name('craftmans.job_preview');
        Route::get('craftmans/jobs_a/edit/{job_id}/{id}','CraftmanController@job_a_edit')->name('craftmans.job_a_edit');
        Route::post('craftmans/jobs_a/job_a_update/{job_id}/{id}','CraftmanController@job_a_update')->name('craftmans.job_a_update');
        Route::get('craftmans/jobs_a/post_now/{job_id}/{id}','CraftmanController@job_post')->name('craftmans.job_post');
        Route::get('craftmans/jobs/image_delete/{image_id}/{id}','CraftmanController@job_image_destroy')->name('craftmans.job_image_destroy');
        Route::get('craftmans/jobs/image_delete_edit/{image_id}/{id}','CraftmanController@job_image_destroy_edit')->name('craftmans.job_image_destroy_edit');
        Route::get('craftmans/jobs_a/destroy/{id}/{job_id}','CraftmanController@job_a_destroy')->name('craftmans.job_destroy');
        
        // reviews senction start
        Route::get('craftmans/reviews/{id}','CraftmanController@reviews')->name('craftmans.reviews');
        Route::post('craftmans/reviews/get_review_details','CraftmanController@get_review_details')->name('craftmans.get_review_details');
        Route::post('craftmans/reviews/update_review_details','CraftmanController@update_review_details')->name('craftmans.update_review_details');
        Route::post('craftmans/reviews/review_reply','CraftmanController@review_reply')->name('craftmans.review_reply');
        Route::get('craftmans/reviews/delete_review/{review_id}/{id}','CraftmanController@delete_review')->name('craftmans.delete_review');
        // reviews senction end

        //enquiries section start
        Route::get('craftmans/enquiries/{id}','CraftmanController@enquiries')->name('craftmans.enquiries');
        Route::get('craftmans/enquiries/{id}/{enq_id}','CraftmanController@enquiries')->name('craftmans.enquiries');
        Route::post('craftmans/enquiries/save_chat','CraftmanController@save_chat')->name('craftmans.save_chat');
        Route::post('craftmans/enquiries/search_users','CraftmanController@search_users')->name('craftmans.search_users');
        Route::get('craftmans/enquiries/save_contact/{id}/{contact_user_id}/{enq_id}','CraftmanController@save_contact')->name('craftmans.save_contact');
        Route::get('craftmans/enquiries/start_chat/{id}/{room_user_id}','CraftmanController@start_chat')->name('craftmans.start_chat');
        Route::get('craftmans/enquiries/remove_contact/{id}/{contact_user_id}/{enq_id}','CraftmanController@remove_contact')->name('craftmans.remove_contact');
        Route::post('craftmans/enquiries/send_file_chat','CraftmanController@send_file_chat')->name('craftmans.send_file_chat');
        

        Route::get('craftmans/enquiries/delete_enquiry/{enquiry_id}/{id}','CraftmanController@delete_enquiry')->name('craftmans.delete_enquiry');
        //enquiries section end

        Route::get('craftmans/destroy/{id}','CraftmanController@destroy')->name('craftmans.destroy');

        // Craftman categories
        Route::get('craftmans/categories','CraftmanController@categories')->name('craftmans.categories');
        Route::post('craftmans/category_store','CraftmanController@category_store')->name('craftmans.category_store');
        Route::get('craftmans/category_edit/{id}','CraftmanController@category_edit')->name('craftmans.category_edit');
        Route::post('craftmans/category_update/{id}','CraftmanController@category_update')->name('craftmans.category_update');

        // Craftman skills
        Route::get('craftmans/skills','CraftmanController@skills')->name('craftmans.skills');
        Route::post('craftmans/skill_store','CraftmanController@skill_store')->name('craftmans.skill_store');
        Route::get('craftmans/skill_edit/{id}','CraftmanController@skill_edit')->name('craftmans.skill_edit');
        Route::post('craftmans/skill_update/{id}','CraftmanController@skill_update')->name('craftmans.skill_update');
        // craftmans section end


        // Manufacturers Section
        Route::get('manufacturers','ManufacturerController@index')->name('manufacturers');
        Route::get('manufacturers/new','ManufacturerController@new')->name('manufacturers.new');
        Route::get('manufacturers/create','ManufacturerController@create')->name('manufacturers.create');
        Route::post('manufacturers/store','ManufacturerController@store')->name('manufacturers.store');
        // Route::get('manufacturers/profile/{id}','ManufacturerController@profile')->name('manufacturers.profile');

        Route::get('manufacturers/my-profile/{id}','ManufacturerController@dashboard')->name('manufacturers.my-profile');
        //profile page
        Route::get('manufacturers/my-profile/profile/{id}','ManufacturerController@profile')->name('manufacturers.profile');
        Route::get('manufacturers/my-profile/profile/{id}/{user_id}','ManufacturerController@profile')->name('manufacturers.profile');

        Route::get('manufacturers/my-profile/personal-detail/{id}','ManufacturerController@personal_detail')->name('manufacturers.personal-detail');
        Route::post('manufacturers/my-profile/personal_submit/{id}','ManufacturerController@personal_submit')->name('manufacturers.personal_submit');
        Route::get('manufacturers/my-profile/social-detail/{id}','ManufacturerController@social_detail')->name('manufacturers.social-detail');
        Route::post('manufacturers/my-profile/social_submit/{id}','ManufacturerController@social_submit')->name('manufacturers.social_submit');
        Route::get('manufacturers/my-profile/update-password/{id}','ManufacturerController@update_password')->name('manufacturers.update-password');
        Route::post('manufacturers/my-profile/password_submit/{id}','ManufacturerController@password_submit')->name('manufacturers.password_submit');

        Route::get('manufacturers/business-profile/business-detail/{id}','ManufacturerController@business_detail')->name('manufacturers.business-detail');
        Route::post('manufacturers/business-profile/business_submit/{id}','ManufacturerController@business_submit')->name('manufacturers.business_submit');
        
        //Image Gallery Section
        Route::get('manufacturers/business-profile/image-gallery/{id}','ManufacturerController@image_gallery')->name('manufacturers.image-gallery');
        Route::post('manufacturers/business-profile/image_submit/{id}','ManufacturerController@image_add')->name('manufacturers.image_add');
        Route::get('manufacturers/business-profile/image_delete/{id}/{image_id}','ManufacturerController@image_delete')->name('manufacturers.image_delete');
        Route::post('manufacturers/business-profile/image_update','ManufacturerController@image_update')->name('manufacturers.image_update');
        Route::post('manufacturers/business-profile/get_image_details','ManufacturerController@get_image_details')->name('manufacturers.get_image_details');


        Route::get('manufacturers/business-profile/promotional-video/{id}','ManufacturerController@promotional_video')->name('manufacturers.promotional-video');
        Route::post('manufacturers/business-profile/promotional_submit/{id}','ManufacturerController@promotional_add')->name('manufacturers.promotional_add');
        Route::get('manufacturers/business-profile/delete_promotional/{id}/{promo_id}','ManufacturerController@delete_promotional')->name('manufacturers.delete_promotional');
        
        //approve account 
        Route::get('manufacturers/approve-account/{id}','ManufacturerController@approve_account')->name('manufacturers.approve_account');

        Route::get('manufacturers/business-profile/address/{id}','ManufacturerController@address')->name('manufacturers.address');
        Route::post('manufacturers/business-profile/save-address/{id}','ManufacturerController@save_address')->name('manufacturers.save_address');


        // manufacturers job section
        Route::get('manufacturers/jobs/{id}','ManufacturerController@jobs')->name('manufacturers.jobs');
        Route::get('manufacturers/jobs/create/{id}','ManufacturerController@job_create')->name('manufacturers.job_create');
        Route::post('manufacturers/job_store/{id}','ManufacturerController@job_store')->name('manufacturers.job_store');
        Route::get('manufacturers/jobs/edit/{id}/{user_id}','ManufacturerController@job_edit')->name('manufacturers.job_edit');
        Route::post('manufacturers/jobs/job_update/{id}/{user_id}','ManufacturerController@job_update')->name('manufacturers.job_update');
        Route::get('manufacturers/jobs/destroy/{id}/{user_id}','ManufacturerController@job_destroy')->name('manufacturers.job_a_destroy');

        // New Job Section
        Route::get('manufacturers/jobs_a/{id}','ManufacturerController@jobs_a')->name('manufacturers.jobs_a');
        Route::get('manufacturers/jobs_a/create/{id}','ManufacturerController@job_a_create')->name('manufacturers.job_a_create');
        Route::post('manufacturers/job_store_a/{id}','ManufacturerController@job_store_a')->name('manufacturers.job_store_a');
        Route::get('manufacturers/jobs_a/job_preview/{job_id}/{id}','ManufacturerController@job_preview')->name('manufacturers.job_preview');
        Route::get('manufacturers/jobs_a/edit/{job_id}/{id}','ManufacturerController@job_a_edit')->name('manufacturers.job_a_edit');
        Route::post('manufacturers/jobs_a/job_a_update/{job_id}/{id}','ManufacturerController@job_a_update')->name('manufacturers.job_a_update');
        Route::get('manufacturers/jobs_a/post_now/{job_id}/{id}','ManufacturerController@job_post')->name('manufacturers.job_post');
        Route::get('manufacturers/jobs/image_delete/{image_id}/{id}','ManufacturerController@job_image_destroy')->name('manufacturers.job_image_destroy');
        Route::get('manufacturers/jobs/image_delete_edit/{image_id}/{id}','ManufacturerController@job_image_destroy_edit')->name('manufacturers.job_image_destroy_edit');
        Route::get('manufacturers/jobs_a/destroy/{id}/{job_id}','ManufacturerController@job_a_destroy')->name('manufacturers.job_destroy');
        

        // reviews senction start
        Route::get('manufacturers/reviews/{id}','ManufacturerController@reviews')->name('manufacturers.reviews');
        Route::post('manufacturers/reviews/get_review_details','ManufacturerController@get_review_details')->name('manufacturers.get_review_details');
        Route::post('manufacturers/reviews/update_review_details','ManufacturerController@update_review_details')->name('manufacturers.update_review_details');
        Route::post('manufacturers/reviews/review_reply','ManufacturerController@review_reply')->name('manufacturers.review_reply');
        Route::get('manufacturers/reviews/delete_review/{review_id}/{id}','ManufacturerController@delete_review')->name('manufacturers.delete_review');
        // reviews senction end
        
        //enquiries section start
        Route::get('manufacturers/enquiries/{id}','ManufacturerController@enquiries')->name('manufacturers.enquiries');
        Route::get('manufacturers/enquiries/{id}/{enq_id}','ManufacturerController@enquiries')->name('manufacturers.enquiries');
        Route::post('manufacturers/enquiries/save_chat','ManufacturerController@save_chat')->name('manufacturers.save_chat');
        Route::post('manufacturers/enquiries/search_users','ManufacturerController@search_users')->name('manufacturers.search_users');
        Route::get('manufacturers/enquiries/save_contact/{id}/{contact_user_id}/{enq_id}','ManufacturerController@save_contact')->name('manufacturers.save_contact');
        Route::get('manufacturers/enquiries/start_chat/{id}/{room_user_id}','ManufacturerController@start_chat')->name('manufacturers.start_chat');
        Route::get('manufacturers/enquiries/remove_contact/{id}/{contact_user_id}/{enq_id}','ManufacturerController@remove_contact')->name('manufacturers.remove_contact');
        Route::post('manufacturers/enquiries/send_file_chat','ManufacturerController@send_file_chat')->name('manufacturers.send_file_chat');

        Route::get('manufacturers/enquiries/delete_enquiry/{enquiry_id}/{id}','ManufacturerController@delete_enquiry')->name('manufacturers.delete_enquiry');
        //enquiries section end

        Route::get('manufacturers/destroy/{id}','ManufacturerController@destroy')->name('manufacturers.destroy');

        // manufacturers categories
        Route::get('manufacturers/categories','ManufacturerController@categories')->name('manufacturers.categories');
        Route::post('manufacturers/category_store','ManufacturerController@category_store')->name('manufacturers.category_store');
        Route::get('manufacturers/category_edit/{id}','ManufacturerController@category_edit')->name('manufacturers.category_edit');
        Route::post('manufacturers/category_update/{id}','ManufacturerController@category_update')->name('manufacturers.category_update');

        // manufacturers skills
        Route::get('manufacturers/skills','ManufacturerController@skills')->name('manufacturers.skills');
        Route::post('manufacturers/skill_store','ManufacturerController@skill_store')->name('manufacturers.skill_store');
        Route::get('manufacturers/skill_edit/{id}','ManufacturerController@skill_edit')->name('manufacturers.skill_edit');
        Route::post('manufacturers/skill_update/{id}','ManufacturerController@skill_update')->name('manufacturers.skill_update');
    // manufacturers Section end


    // Designers Section
    Route::get('designers','DesignerController@index')->name('designers');
    Route::get('designers/new','DesignerController@new')->name('designers.new');
    Route::get('designers/create','DesignerController@create')->name('designers.create');
    Route::post('designers/store','DesignerController@store')->name('designers.store');
    // Route::get('designers/profile/{id}','DesignerController@profile')->name('designers.profile');
    
    Route::get('designers/my-profile/{id}','DesignerController@dashboard')->name('designers.my-profile');

    //profile page
    Route::get('designers/my-profile/profile/{id}','DesignerController@profile')->name('designers.profile');
    Route::get('designers/my-profile/profile/{id}/{user_id}','DesignerController@profile')->name('designers.profile');

    Route::get('designers/my-profile/personal-detail/{id}','DesignerController@personal_detail')->name('designers.personal-detail');
    Route::post('designers/my-profile/personal_submit/{id}','DesignerController@personal_submit')->name('designers.personal_submit');
    Route::get('designers/my-profile/social-detail/{id}','DesignerController@social_detail')->name('designers.social-detail');
    Route::post('designers/my-profile/social_submit/{id}','DesignerController@social_submit')->name('designers.social_submit');
    Route::get('designers/my-profile/update-password/{id}','DesignerController@update_password')->name('designers.update-password');
    Route::post('designers/my-profile/password_submit/{id}','DesignerController@password_submit')->name('designers.password_submit');

    Route::get('designers/business-profile/business-detail/{id}','DesignerController@business_detail')->name('designers.business-detail');
    Route::post('designers/business-profile/business_submit/{id}','DesignerController@business_submit')->name('designers.business_submit');
    
    //Image Gallery Section
    Route::get('designers/business-profile/image-gallery/{id}','DesignerController@image_gallery')->name('designers.image-gallery');
    Route::post('designers/business-profile/image_submit/{id}','DesignerController@image_add')->name('designers.image_add');
    Route::get('designers/business-profile/image_delete/{id}/{image_id}','DesignerController@image_delete')->name('designers.image_delete');
    Route::post('designers/business-profile/image_update','DesignerController@image_update')->name('designers.image_update');
    Route::post('designers/business-profile/get_image_details','DesignerController@get_image_details')->name('designers.get_image_details');


    Route::get('designers/business-profile/promotional-video/{id}','DesignerController@promotional_video')->name('designers.promotional-video');
    Route::post('designers/business-profile/promotional_submit/{id}','DesignerController@promotional_add')->name('designers.promotional_add');
    Route::get('designers/business-profile/delete_promotional/{id}/{promo_id}','DesignerController@delete_promotional')->name('designers.delete_promotional');
    
    //approve account 
    Route::get('designers/approve-account/{id}','DesignerController@approve_account')->name('designers.approve_account');

    Route::get('designers/business-profile/address/{id}','DesignerController@address')->name('designers.address');
    Route::post('designers/business-profile/save-address/{id}','DesignerController@save_address')->name('designers.save_address');


    // manufacturers job section
    Route::get('designers/jobs/{id}','DesignerController@jobs')->name('designers.jobs');
    Route::get('designers/jobs/create/{id}','DesignerController@job_create')->name('designers.job_create');
    Route::post('designers/job_store/{id}','DesignerController@job_store')->name('designers.job_store');
    Route::get('designers/jobs/edit/{id}/{user_id}','DesignerController@job_edit')->name('designers.job_edit');
    Route::post('designers/jobs/job_update/{id}/{user_id}','DesignerController@job_update')->name('designers.job_update');
    Route::get('designers/jobs/destroy/{id}/{user_id}','DesignerController@job_destroy')->name('designers.job_a_destroy');

    // New Job Section
    Route::get('designers/jobs_a/{id}','DesignerController@jobs_a')->name('designers.jobs_a');
    Route::get('designers/jobs_a/create/{id}','DesignerController@job_a_create')->name('designers.job_a_create');
    Route::post('designers/job_store_a/{id}','DesignerController@job_store_a')->name('designers.job_store_a');
    Route::get('designers/jobs_a/job_preview/{job_id}/{id}','DesignerController@job_preview')->name('designers.job_preview');
    Route::get('designers/jobs_a/edit/{job_id}/{id}','DesignerController@job_a_edit')->name('designers.job_a_edit');
    Route::post('designers/jobs_a/job_a_update/{job_id}/{id}','DesignerController@job_a_update')->name('designers.job_a_update');
    Route::get('designers/jobs_a/post_now/{job_id}/{id}','DesignerController@job_post')->name('designers.job_post');
    Route::get('designers/jobs/image_delete/{image_id}/{id}','DesignerController@job_image_destroy')->name('designers.job_image_destroy');
    Route::get('designers/jobs/image_delete_edit/{image_id}/{id}','DesignerController@job_image_destroy_edit')->name('designers.job_image_destroy_edit');
    Route::get('designers/jobs_a/destroy/{id}/{job_id}','DesignerController@job_a_destroy')->name('designers.job_destroy');
    

    // reviews senction start
    Route::get('designers/reviews/{id}','DesignerController@reviews')->name('designers.reviews');
    Route::post('designers/reviews/get_review_details','DesignerController@get_review_details')->name('designers.get_review_details');
    Route::post('designers/reviews/update_review_details','DesignerController@update_review_details')->name('designers.update_review_details');
    Route::post('designers/reviews/review_reply','DesignerController@review_reply')->name('designers.review_reply');
    Route::get('designers/reviews/delete_review/{review_id}/{id}','DesignerController@delete_review')->name('designers.delete_review');
    // reviews senction end
    
    //enquiries section start
    Route::get('designers/enquiries/{id}','DesignerController@enquiries')->name('designers.enquiries');
    Route::get('designers/enquiries/{id}/{enq_id}','DesignerController@enquiries')->name('designers.enquiries');
    Route::post('designers/enquiries/save_chat','DesignerController@save_chat')->name('designers.save_chat');
    Route::post('designers/enquiries/search_users','DesignerController@search_users')->name('designers.search_users');
    Route::get('designers/enquiries/save_contact/{id}/{contact_user_id}/{enq_id}','DesignerController@save_contact')->name('designers.save_contact');
    Route::get('designers/enquiries/start_chat/{id}/{room_user_id}','DesignerController@start_chat')->name('designers.start_chat');
    Route::get('designers/enquiries/remove_contact/{id}/{contact_user_id}/{enq_id}','DesignerController@remove_contact')->name('designers.remove_contact');
    Route::post('designers/enquiries/send_file_chat','DesignerController@send_file_chat')->name('designers.send_file_chat');
    

    Route::get('designers/enquiries/delete_enquiry/{enquiry_id}/{id}','DesignerController@delete_enquiry')->name('designers.delete_enquiry');
    //enquiries section end


    Route::get('designers/destroy/{id}','DesignerController@destroy')->name('designers.destroy');

    // designers categories
    Route::get('designers/categories','DesignerController@categories')->name('designers.categories');
    Route::post('designers/category_store','DesignerController@category_store')->name('designers.category_store');
    Route::get('designers/category_edit/{id}','DesignerController@category_edit')->name('designers.category_edit');
    Route::post('designers/category_update/{id}','DesignerController@category_update')->name('designers.category_update');

    // designers skills
    Route::get('designers/skills','DesignerController@skills')->name('designers.skills');
    Route::post('designers/skill_store','DesignerController@skill_store')->name('designers.skill_store');
    Route::get('designers/skill_edit/{id}','DesignerController@skill_edit')->name('designers.skill_edit');
    Route::post('designers/skill_update/{id}','DesignerController@skill_update')->name('designers.skill_update');
    // Designers Section end



        // Photographers Section
        Route::get('photographers','PhotographerController@index')->name('photographers');
        Route::get('photographers/new','PhotographerController@new')->name('photographers.new');
        Route::get('photographers/create','PhotographerController@create')->name('photographers.create');
        Route::post('photographers/store','PhotographerController@store')->name('photographers.store');
        // Route::get('photographers/profile/{id}','PhotographerController@profile')->name('photographers.profile');

        Route::get('photographers/my-profile/{id}','PhotographerController@dashboard')->name('photographers.my-profile');

        //profile page
        Route::get('photographers/my-profile/profile/{id}','PhotographerController@profile')->name('photographers.profile');
        Route::get('photographers/my-profile/profile/{id}/{user_id}','PhotographerController@profile')->name('photographers.profile');
        
        Route::get('photographers/my-profile/personal-detail/{id}','PhotographerController@personal_detail')->name('photographers.personal-detail');
        Route::post('photographers/my-profile/personal_submit/{id}','PhotographerController@personal_submit')->name('photographers.personal_submit');
        Route::get('photographers/my-profile/social-detail/{id}','PhotographerController@social_detail')->name('photographers.social-detail');
        Route::post('photographers/my-profile/social_submit/{id}','PhotographerController@social_submit')->name('photographers.social_submit');
        Route::get('photographers/my-profile/update-password/{id}','PhotographerController@update_password')->name('photographers.update-password');
        Route::post('photographers/my-profile/password_submit/{id}','PhotographerController@password_submit')->name('photographers.password_submit');

        Route::get('photographers/business-profile/business-detail/{id}','PhotographerController@business_detail')->name('photographers.business-detail');
        Route::post('photographers/business-profile/business_submit/{id}','PhotographerController@business_submit')->name('photographers.business_submit');
        
        //Image Gallery Section
        Route::get('photographers/business-profile/image-gallery/{id}','PhotographerController@image_gallery')->name('photographers.image-gallery');
        Route::post('photographers/business-profile/image_submit/{id}','PhotographerController@image_add')->name('photographers.image_add');
        Route::get('photographers/business-profile/image_delete/{id}/{image_id}','PhotographerController@image_delete')->name('photographers.image_delete');
        Route::post('photographers/business-profile/image_update','PhotographerController@image_update')->name('photographers.image_update');
        Route::post('photographers/business-profile/get_image_details','PhotographerController@get_image_details')->name('photographers.get_image_details');
        

        Route::get('photographers/business-profile/promotional-video/{id}','PhotographerController@promotional_video')->name('photographers.promotional-video');
        Route::post('photographers/business-profile/promotional_submit/{id}','PhotographerController@promotional_add')->name('photographers.promotional_add');
        Route::get('photographers/business-profile/delete_promotional/{id}/{promo_id}','PhotographerController@delete_promotional')->name('photographers.delete_promotional');
        
        //approve account 
        Route::get('photographers/approve-account/{id}','PhotographerController@approve_account')->name('photographers.approve_account');

        Route::get('photographers/business-profile/address/{id}','PhotographerController@address')->name('photographers.address');
        Route::post('photographers/business-profile/save-address/{id}','PhotographerController@save_address')->name('photographers.save_address');


        // Photographer job section
        Route::get('photographers/jobs/{id}','PhotographerController@jobs')->name('photographers.jobs');
        Route::get('photographers/jobs/create/{id}','PhotographerController@job_create')->name('photographers.job_create');
        Route::post('photographers/job_store/{id}','PhotographerController@job_store')->name('photographers.job_store');
        Route::get('photographers/jobs/edit/{id}/{user_id}','PhotographerController@job_edit')->name('photographers.job_edit');
        Route::post('photographers/jobs/job_update/{id}/{user_id}','PhotographerController@job_update')->name('photographers.job_update');
        Route::get('photographers/jobs/destroy/{id}/{user_id}','PhotographerController@job_destroy')->name('photographers.job_a_destroy');

        // New Job Section
        Route::get('photographers/jobs_a/{id}','PhotographerController@jobs_a')->name('photographers.jobs_a');
        Route::get('photographers/jobs_a/create/{id}','PhotographerController@job_a_create')->name('photographers.job_a_create');
        Route::post('photographers/job_store_a/{id}','PhotographerController@job_store_a')->name('photographers.job_store_a');
        Route::get('photographers/jobs_a/job_preview/{job_id}/{id}','PhotographerController@job_preview')->name('photographers.job_preview');
        Route::get('photographers/jobs_a/edit/{job_id}/{id}','PhotographerController@job_a_edit')->name('photographers.job_a_edit');
        Route::post('photographers/jobs_a/job_a_update/{job_id}/{id}','PhotographerController@job_a_update')->name('photographers.job_a_update');
        Route::get('photographers/jobs_a/post_now/{job_id}/{id}','PhotographerController@job_post')->name('photographers.job_post');
        Route::get('photographers/jobs/image_delete/{image_id}/{id}','PhotographerController@job_image_destroy')->name('photographers.job_image_destroy');
        Route::get('photographers/jobs/image_delete_edit/{image_id}/{id}','PhotographerController@job_image_destroy_edit')->name('photographers.job_image_destroy_edit');
        Route::get('photographers/jobs_a/destroy/{id}/{job_id}','PhotographerController@job_a_destroy')->name('photographers.job_destroy');
        

        // reviews senction start
        Route::get('photographers/reviews/{id}','PhotographerController@reviews')->name('photographers.reviews');
        Route::post('photographers/reviews/get_review_details','PhotographerController@get_review_details')->name('photographers.get_review_details');
        Route::post('photographers/reviews/update_review_details','PhotographerController@update_review_details')->name('photographers.update_review_details');
        Route::post('photographers/reviews/review_reply','PhotographerController@review_reply')->name('photographers.review_reply');
        Route::get('photographers/reviews/delete_review/{review_id}/{id}','PhotographerController@delete_review')->name('photographers.delete_review');
        // reviews senction end
        
        //enquiries section start
        Route::get('photographers/enquiries/{id}','PhotographerController@enquiries')->name('photographers.enquiries');
        Route::get('photographers/enquiries/{id}/{enq_id}','PhotographerController@enquiries')->name('photographers.enquiries');
        Route::post('photographers/enquiries/save_chat','PhotographerController@save_chat')->name('photographers.save_chat');
        Route::post('photographers/enquiries/search_users','PhotographerController@search_users')->name('photographers.search_users');
        Route::get('photographers/enquiries/save_contact/{id}/{contact_user_id}/{enq_id}','PhotographerController@save_contact')->name('photographers.save_contact');
        Route::get('photographers/enquiries/start_chat/{id}/{room_user_id}','PhotographerController@start_chat')->name('photographers.start_chat');
        Route::get('photographers/enquiries/remove_contact/{id}/{contact_user_id}/{enq_id}','PhotographerController@remove_contact')->name('photographers.remove_contact');
        Route::post('photographers/enquiries/send_file_chat','PhotographerController@send_file_chat')->name('photographers.send_file_chat');
        

        Route::get('photographers/enquiries/delete_enquiry/{enquiry_id}/{id}','PhotographerController@delete_enquiry')->name('photographers.delete_enquiry');
        //enquiries section end


        Route::get('photographers/destroy/{id}','PhotographerController@destroy')->name('photographers.destroy');

        // photographers categories
        Route::get('photographers/categories','PhotographerController@categories')->name('photographers.categories');
        Route::post('photographers/category_store','PhotographerController@category_store')->name('photographers.category_store');
        Route::get('photographers/category_edit/{id}','PhotographerController@category_edit')->name('photographers.category_edit');
        Route::post('photographers/category_update/{id}','PhotographerController@category_update')->name('photographers.category_update');

        // photographers skills
        Route::get('photographers/skills','PhotographerController@skills')->name('photographers.skills');
        Route::post('photographers/skill_store','PhotographerController@skill_store')->name('photographers.skill_store');
        Route::get('photographers/skill_edit/{id}','PhotographerController@skill_edit')->name('photographers.skill_edit');
        Route::post('photographers/skill_update/{id}','PhotographerController@skill_update')->name('photographers.skill_update');
        // Photographers Section end



        // Exporters Section
        Route::get('exporters','ExporterController@index')->name('exporters');
        Route::get('exporters/new','ExporterController@new')->name('exporters.new');
        Route::get('exporters/create','ExporterController@create')->name('exporters.create');
        Route::post('exporters/store','ExporterController@store')->name('exporters.store');
        // Route::get('exporters/profile/{id}','ExporterController@profile')->name('exporters.profile');

        Route::get('exporters/my-profile/{id}','ExporterController@dashboard')->name('exporters.my-profile');

        //profile page
        Route::get('exporters/my-profile/profile/{id}','ExporterController@profile')->name('exporters.profile');
        Route::get('exporters/my-profile/profile/{id}/{user_id}','ExporterController@profile')->name('exporters.profile');
        
        Route::get('exporters/my-profile/personal-detail/{id}','ExporterController@personal_detail')->name('exporters.personal-detail');
        Route::post('exporters/my-profile/personal_submit/{id}','ExporterController@personal_submit')->name('exporters.personal_submit');
        Route::get('exporters/my-profile/social-detail/{id}','ExporterController@social_detail')->name('exporters.social-detail');
        Route::post('exporters/my-profile/social_submit/{id}','ExporterController@social_submit')->name('exporters.social_submit');
        Route::get('exporters/my-profile/update-password/{id}','ExporterController@update_password')->name('exporters.update-password');
        Route::post('exporters/my-profile/password_submit/{id}','ExporterController@password_submit')->name('exporters.password_submit');

        Route::get('exporters/business-profile/business-detail/{id}','ExporterController@business_detail')->name('exporters.business-detail');
        Route::post('exporters/business-profile/business_submit/{id}','ExporterController@business_submit')->name('exporters.business_submit');
        
        //Image Gallery Section
        Route::get('exporters/business-profile/image-gallery/{id}','ExporterController@image_gallery')->name('exporters.image-gallery');
        Route::post('exporters/business-profile/image_submit/{id}','ExporterController@image_add')->name('exporters.image_add');
        Route::get('exporters/business-profile/image_delete/{id}/{image_id}','ExporterController@image_delete')->name('exporters.image_delete');
        Route::post('exporters/business-profile/image_update','ExporterController@image_update')->name('exporters.image_update');
        Route::post('exporters/business-profile/get_image_details','ExporterController@get_image_details')->name('exporters.get_image_details');


        Route::get('exporters/business-profile/promotional-video/{id}','ExporterController@promotional_video')->name('exporters.promotional-video');
        Route::post('exporters/business-profile/promotional_submit/{id}','ExporterController@promotional_add')->name('exporters.promotional_add');
        Route::get('exporters/business-profile/delete_promotional/{id}/{promo_id}','ExporterController@delete_promotional')->name('exporters.delete_promotional');
        
        //approve account 
        Route::get('exporters/approve-account/{id}','ExporterController@approve_account')->name('exporters.approve_account');

        Route::get('exporters/business-profile/address/{id}','ExporterController@address')->name('exporters.address');
        Route::post('exporters/business-profile/save-address/{id}','ExporterController@save_address')->name('exporters.save_address');


        // Photographer job section
        Route::get('exporters/jobs/{id}','ExporterController@jobs')->name('exporters.jobs');
        Route::get('exporters/jobs/create/{id}','ExporterController@job_create')->name('exporters.job_create');
        Route::post('exporters/job_store/{id}','ExporterController@job_store')->name('exporters.job_store');
        Route::get('exporters/jobs/edit/{id}/{user_id}','ExporterController@job_edit')->name('exporters.job_edit');
        Route::post('exporters/jobs/job_update/{id}/{user_id}','ExporterController@job_update')->name('exporters.job_update');
        Route::get('exporters/jobs/destroy/{id}/{user_id}','ExporterController@job_destroy')->name('exporters.job_a_destroy');

        // New Job Section
        Route::get('exporters/jobs_a/{id}','ExporterController@jobs_a')->name('exporters.jobs_a');
        Route::get('exporters/jobs_a/create/{id}','ExporterController@job_a_create')->name('exporters.job_a_create');
        Route::post('exporters/job_store_a/{id}','ExporterController@job_store_a')->name('exporters.job_store_a');
        Route::get('exporters/jobs_a/job_preview/{job_id}/{id}','ExporterController@job_preview')->name('exporters.job_preview');
        Route::get('exporters/jobs_a/edit/{job_id}/{id}','ExporterController@job_a_edit')->name('exporters.job_a_edit');
        Route::post('exporters/jobs_a/job_a_update/{job_id}/{id}','ExporterController@job_a_update')->name('exporters.job_a_update');
        Route::get('exporters/jobs_a/post_now/{job_id}/{id}','ExporterController@job_post')->name('exporters.job_post');
        Route::get('exporters/jobs/image_delete/{image_id}/{id}','ExporterController@job_image_destroy')->name('exporters.job_image_destroy');
        Route::get('exporters/jobs/image_delete_edit/{image_id}/{id}','ExporterController@job_image_destroy_edit')->name('exporters.job_image_destroy_edit');
        Route::get('exporters/jobs_a/destroy/{id}/{job_id}','ExporterController@job_a_destroy')->name('exporters.job_destroy');
        

        // reviews senction start
        Route::get('exporters/reviews/{id}','ExporterController@reviews')->name('exporters.reviews');
        Route::post('exporters/reviews/get_review_details','ExporterController@get_review_details')->name('exporters.get_review_details');
        Route::post('exporters/reviews/update_review_details','ExporterController@update_review_details')->name('exporters.update_review_details');
        Route::post('exporters/reviews/review_reply','ExporterController@review_reply')->name('exporters.review_reply');
        Route::get('exporters/reviews/delete_review/{review_id}/{id}','ExporterController@delete_review')->name('exporters.delete_review');
        // reviews senction end
        
        
        //enquiries section start
        Route::get('exporters/enquiries/{id}','ExporterController@enquiries')->name('exporters.enquiries');
        Route::get('exporters/enquiries/{id}/{enq_id}','ExporterController@enquiries')->name('exporters.enquiries');
        Route::post('exporters/enquiries/save_chat','ExporterController@save_chat')->name('exporters.save_chat');
        Route::post('exporters/enquiries/search_users','ExporterController@search_users')->name('exporters.search_users');
        Route::get('exporters/enquiries/save_contact/{id}/{contact_user_id}/{enq_id}','ExporterController@save_contact')->name('exporters.save_contact');
        Route::get('exporters/enquiries/start_chat/{id}/{room_user_id}','ExporterController@start_chat')->name('exporters.start_chat');
        Route::get('exporters/enquiries/remove_contact/{id}/{contact_user_id}/{enq_id}','ExporterController@remove_contact')->name('exporters.remove_contact');
        Route::post('exporters/enquiries/send_file_chat','ExporterController@send_file_chat')->name('exporters.send_file_chat');
        

        Route::get('exporters/enquiries/delete_enquiry/{enquiry_id}/{id}','ExporterController@delete_enquiry')->name('exporters.delete_enquiry');
        //enquiries section end


        Route::get('exporters/destroy/{id}','ExporterController@destroy')->name('exporters.destroy');

        // exporters categories
        Route::get('exporters/categories','ExporterController@categories')->name('exporters.categories');
        Route::post('exporters/category_store','ExporterController@category_store')->name('exporters.category_store');
        Route::get('exporters/category_edit/{id}','ExporterController@category_edit')->name('exporters.category_edit');
        Route::post('exporters/category_update/{id}','ExporterController@category_update')->name('exporters.category_update');

        // exporters skills
        Route::get('exporters/skills','ExporterController@skills')->name('exporters.skills');
        Route::post('exporters/skill_store','ExporterController@skill_store')->name('exporters.skill_store');
        Route::get('exporters/skill_edit/{id}','ExporterController@skill_edit')->name('exporters.skill_edit');
        Route::post('exporters/skill_update/{id}','ExporterController@skill_update')->name('exporters.skill_update');
        // Exporters Section end




        // Painters Section
        Route::get('painters','PainterController@index')->name('painters');
        Route::get('painters/new','PainterController@new')->name('painters.new');
        Route::get('painters/create','PainterController@create')->name('painters.create');
        Route::post('painters/store','PainterController@store')->name('painters.store');
        // Route::get('painters/profile/{id}','PainterController@profile')->name('painters.profile');

        Route::get('painters/my-profile/{id}','PainterController@dashboard')->name('painters.my-profile');

        //profile page
        Route::get('painters/my-profile/profile/{id}','PainterController@profile')->name('painters.profile');
        Route::get('painters/my-profile/profile/{id}/{user_id}','PainterController@profile')->name('painters.profile');

        Route::get('painters/my-profile/personal-detail/{id}','PainterController@personal_detail')->name('painters.personal-detail');
        Route::post('painters/my-profile/personal_submit/{id}','PainterController@personal_submit')->name('painters.personal_submit');
        Route::get('painters/my-profile/social-detail/{id}','PainterController@social_detail')->name('painters.social-detail');
        Route::post('painters/my-profile/social_submit/{id}','PainterController@social_submit')->name('painters.social_submit');
        Route::get('painters/my-profile/update-password/{id}','PainterController@update_password')->name('painters.update-password');
        Route::post('painters/my-profile/password_submit/{id}','PainterController@password_submit')->name('painters.password_submit');

        Route::get('painters/business-profile/business-detail/{id}','PainterController@business_detail')->name('painters.business-detail');
        Route::post('painters/business-profile/business_submit/{id}','PainterController@business_submit')->name('painters.business_submit');
        
        
        //Image Gallery Section
        Route::get('painters/business-profile/image-gallery/{id}','PainterController@image_gallery')->name('painters.image-gallery');
        Route::post('painters/business-profile/image_submit/{id}','PainterController@image_add')->name('painters.image_add');
        Route::get('painters/business-profile/image_delete/{id}/{image_id}','PainterController@image_delete')->name('painters.image_delete');
        Route::post('painters/business-profile/image_update','PainterController@image_update')->name('painters.image_update');
        Route::post('painters/business-profile/get_image_details','PainterController@get_image_details')->name('painters.get_image_details');


        Route::get('painters/business-profile/promotional-video/{id}','PainterController@promotional_video')->name('painters.promotional-video');
        Route::post('painters/business-profile/promotional_submit/{id}','PainterController@promotional_add')->name('painters.promotional_add');
        Route::get('painters/business-profile/delete_promotional/{id}/{promo_id}','PainterController@delete_promotional')->name('painters.delete_promotional');
        
        //approve account 
        Route::get('painters/approve-account/{id}','PainterController@approve_account')->name('painters.approve_account');

        Route::get('painters/business-profile/address/{id}','PainterController@address')->name('painters.address');
        Route::post('painters/business-profile/save-address/{id}','PainterController@save_address')->name('painters.save_address');


        // painters job section
        Route::get('painters/jobs/{id}','PainterController@jobs')->name('painters.jobs');
        Route::get('painters/jobs/create/{id}','PainterController@job_create')->name('painters.job_create');
        Route::post('painters/job_store/{id}','PainterController@job_store')->name('painters.job_store');
        Route::get('painters/jobs/edit/{id}/{user_id}','PainterController@job_edit')->name('painters.job_edit');
        Route::post('painters/jobs/job_update/{id}/{user_id}','PainterController@job_update')->name('painters.job_update');
        Route::get('painters/jobs/destroy/{id}/{user_id}','PainterController@job_destroy')->name('painters.job_a_destroy');

        // New Job Section
        Route::get('painters/jobs_a/{id}','PainterController@jobs_a')->name('painters.jobs_a');
        Route::get('painters/jobs_a/create/{id}','PainterController@job_a_create')->name('painters.job_a_create');
        Route::post('painters/job_store_a/{id}','PainterController@job_store_a')->name('painters.job_store_a');
        Route::get('painters/jobs_a/job_preview/{job_id}/{id}','PainterController@job_preview')->name('painters.job_preview');
        Route::get('painters/jobs_a/edit/{job_id}/{id}','PainterController@job_a_edit')->name('painters.job_a_edit');
        Route::post('painters/jobs_a/job_a_update/{job_id}/{id}','PainterController@job_a_update')->name('painters.job_a_update');
        Route::get('painters/jobs_a/post_now/{job_id}/{id}','PainterController@job_post')->name('painters.job_post');
        Route::get('painters/jobs/image_delete/{image_id}/{id}','PainterController@job_image_destroy')->name('painters.job_image_destroy');
        Route::get('painters/jobs/image_delete_edit/{image_id}/{id}','PainterController@job_image_destroy_edit')->name('painters.job_image_destroy_edit');
        Route::get('painters/jobs_a/destroy/{id}/{job_id}','PainterController@job_a_destroy')->name('painters.job_destroy');
        

        // reviews senction start
        Route::get('painters/reviews/{id}','PainterController@reviews')->name('painters.reviews');
        Route::post('painters/reviews/get_review_details','PainterController@get_review_details')->name('painters.get_review_details');
        Route::post('painters/reviews/update_review_details','PainterController@update_review_details')->name('painters.update_review_details');
        Route::post('painters/reviews/review_reply','PainterController@review_reply')->name('painters.review_reply');
        Route::get('painters/reviews/delete_review/{review_id}/{id}','PainterController@delete_review')->name('painters.delete_review');
        // reviews senction end
        
        
        //enquiries section start
        Route::get('painters/enquiries/{id}','PainterController@enquiries')->name('painters.enquiries');
        Route::get('painters/enquiries/{id}/{enq_id}','PainterController@enquiries')->name('painters.enquiries');
        Route::post('painters/enquiries/save_chat','PainterController@save_chat')->name('painters.save_chat');
        Route::post('painters/enquiries/search_users','PainterController@search_users')->name('painters.search_users');
        Route::get('painters/enquiries/save_contact/{id}/{contact_user_id}/{enq_id}','PainterController@save_contact')->name('painters.save_contact');
        Route::get('painters/enquiries/start_chat/{id}/{room_user_id}','PainterController@start_chat')->name('painters.start_chat');
        Route::get('painters/enquiries/remove_contact/{id}/{contact_user_id}/{enq_id}','PainterController@remove_contact')->name('painters.remove_contact');
        Route::post('painters/enquiries/send_file_chat','PainterController@send_file_chat')->name('painters.send_file_chat');
        

        Route::get('painters/enquiries/delete_enquiry/{enquiry_id}/{id}','PainterController@delete_enquiry')->name('painters.delete_enquiry');
        //enquiries section end


        Route::get('painters/destroy/{id}','PainterController@destroy')->name('painters.destroy');

        // painters categories
        Route::get('painters/categories','PainterController@categories')->name('painters.categories');
        Route::post('painters/category_store','PainterController@category_store')->name('painters.category_store');
        Route::get('painters/category_edit/{id}','PainterController@category_edit')->name('painters.category_edit');
        Route::post('painters/category_update/{id}','PainterController@category_update')->name('painters.category_update');

        // painters skills
        Route::get('painters/skills','PainterController@skills')->name('painters.skills');
        Route::post('painters/skill_store','PainterController@skill_store')->name('painters.skill_store');
        Route::get('painters/skill_edit/{id}','PainterController@skill_edit')->name('painters.skill_edit');
        Route::post('painters/skill_update/{id}','PainterController@skill_update')->name('painters.skill_update');
        // painters Section end



        // clients Section
        
        Route::get('clients/my-profile/{id}','ClientController@dashboard')->name('clients.my-profile');

        //profile page
        Route::get('clients/my-profile/profile/{id}','ClientController@profile')->name('clients.profile');
        Route::get('clients/my-profile/profile/{id}/{user_id}','ClientController@profile')->name('clients.profile');

        Route::get('clients/my-profile/personal-detail/{id}','ClientController@personal_detail')->name('clients.personal-detail');
        Route::post('clients/my-profile/personal_submit/{id}','ClientController@personal_submit')->name('clients.personal_submit');
        Route::get('clients/my-profile/social-detail/{id}','ClientController@social_detail')->name('clients.social-detail');
        Route::post('clients/my-profile/social_submit/{id}','ClientController@social_submit')->name('clients.social_submit');
        Route::get('clients/my-profile/update-password/{id}','ClientController@update_password')->name('clients.update-password');
        Route::post('clients/my-profile/password_submit/{id}','ClientController@password_submit')->name('clients.password_submit');

        Route::get('clients/business-profile/start-service/{id}','ClientController@business_detail')->name('clients.business-detail');
        Route::post('clients/business-profile/service_submit/{id}','ClientController@service_submit')->name('clients.service_submit');
        

        // reviews senction start
        Route::get('clients/reviews/{id}','ClientController@reviews')->name('clients.reviews');
        Route::post('clients/reviews/get_review_details','ClientController@get_review_details')->name('clients.get_review_details');
        Route::post('clients/reviews/update_review_details','ClientController@update_review_details')->name('clients.update_review_details');
        Route::post('clients/reviews/review_reply','ClientController@review_reply')->name('clients.review_reply');
        Route::get('clients/reviews/delete_review/{review_id}/{id}','ClientController@delete_review')->name('clients.delete_review');
        // reviews senction end
        
        //enquiries section start
        Route::get('clients/enquiries/{id}','ClientController@enquiries')->name('clients.enquiries');
        Route::get('clients/enquiries/{id}/{enq_id}','ClientController@enquiries')->name('clients.enquiries');
        Route::post('clients/enquiries/save_chat','ClientController@save_chat')->name('clients.save_chat');
        Route::post('clients/enquiries/search_users','ClientController@search_users')->name('clients.search_users');
        Route::get('clients/enquiries/save_contact/{id}/{contact_user_id}/{enq_id}','ClientController@save_contact')->name('clients.save_contact');
        Route::get('clients/enquiries/start_chat/{id}/{room_user_id}','ClientController@start_chat')->name('clients.start_chat');
        Route::get('clients/enquiries/remove_contact/{id}/{contact_user_id}/{enq_id}','ClientController@remove_contact')->name('clients.remove_contact');
        Route::post('clients/enquiries/send_file_chat','ClientController@send_file_chat')->name('clients.send_file_chat');

        Route::get('clients/enquiries/delete_enquiry/{enquiry_id}/{id}','ClientController@delete_enquiry')->name('clients.delete_enquiry');
        //enquiries section end

        Route::get('clients/destroy/{id}','ClientController@destroy')->name('clients.destroy');

        // clients section end


        Route::resource('products','ProductController');


        // Settings Section
        Route::get('setting','SettingController@index')->name('setting');
        Route::post('setting/store','SettingController@store')->name('setting.store');
        Route::get('setting/change-password','SettingController@change_password')->name('setting.change-password');
        Route::post('setting/password_submit','SettingController@password_submit')->name('setting.password_submit');
        Route::get('setting/theme-setting','SettingController@theme_setting')->name('setting.theme-setting');
        Route::post('setting/theme_submit','SettingController@theme_submit')->name('setting.theme_submit');
        
        Route::get('setting/regions','SettingController@regions')->name('setting.regions');
        Route::post('setting/store_country','SettingController@store_country')->name('setting.store_country');
        Route::post('setting/store_state','SettingController@store_state')->name('setting.store_state');
        Route::post('setting/store_city','SettingController@store_city')->name('setting.store_city');
        Route::post('setting/get_states','SettingController@get_states')->name('setting.get_states');
        
        Route::get('setting/edit_country/{id}','SettingController@edit_country')->name('setting.edit_country');
        Route::post('setting/update_country/{id}','SettingController@update_country')->name('setting.update_country');

        Route::get('setting/edit_state/{id}','SettingController@edit_state')->name('setting.edit_country');
        Route::post('setting/update_state/{id}','SettingController@update_state')->name('setting.update_state');
        Route::get('setting/delete_state/{id}','SettingController@delete_state')->name('setting.delete_state');


        Route::get('setting/edit_city/{id}','SettingController@edit_city')->name('setting.edit_city');
        Route::post('setting/update_city/{id}','SettingController@update_city')->name('setting.update_city');
        Route::get('setting/delete_city/{id}','SettingController@delete_city')->name('setting.delete_city');
    
        //pages section
        Route::get('pages','PagesController@index')->name('pages');
        Route::get('pages/contact-us','PagesController@contact_us')->name('pages.contact-us');
        Route::post('pages/contact_submit','PagesController@contact_submit')->name('pages.contact_submit');

        // COntact Us Listing
        Route::get('contact-us','ContactusController@index')->name('contact-us');
        Route::get('read-contact/{id}', 'ContactusController@read')->name('read-contact');

        Route::any ( 'search', function () {
            $q = Request::get ( 'q' );
            $contact_list = ContactList::where ( 'sender_name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
            $unread_count = ContactList::where('status','=','unread')->get();
            $status = 'readnot';
            if (count ( $contact_list ) > 0){
                //return view ( 'contact.index' )->withDetails ( $user )->withQuery ( $q );
                return view('contact.index',compact('q', 'contact_list','status','unread_count'));
            }
            else
                $contact_list = null;
                return view('contact.index',compact('q', 'status','contact_list','unread_count'));
        } );
        
    });
});

Route::group(['middleware' => 'is.admin'], function () {
    // Route::get('users','UserController@index')->name('users');
});