<?php



use App\Models\Post;
use App\Models\User;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\PostsController;
use App\Http\Controllers\Backend\QuoteController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\Backend\PostTagsController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\PermissionsController;
use App\Http\Controllers\Backend\SupervisorsController;
use App\Http\Controllers\Frontend\DarAlnuzumController;
use App\Http\Controllers\Backend\PostCommentsController;
use App\Http\Controllers\Backend\PostCategoriesController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Auth\VerificationController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\UsersController as BackendUsersController;
use App\Http\Controllers\Frontend\UsersController as FrontendUsersController;
use App\Http\Controllers\Backend\Auth\LoginController as BackendLoginController;
use App\Http\Controllers\Frontend\Auth\LoginController as FrontendLoginController;
use App\Http\Controllers\Backend\NotificationsController as BackendNotificationsController;
use App\Http\Controllers\Frontend\NotificationsController as FrontendNotificationsController;

Route::get('test-google', function () {
    Storage::disk('google')->put('hello.txt', "Hello World");
    return view('dar_al_nuzum.index1');
});

//home page
Route::get('/', [DarAlnuzumController::class, 'home'])->name('dar.home');
// filter by category and top client
Route::get('/filter-categories/{category_slug}', [IndexController::class, 'filterBy_category'])->name('frontend.filter_category');
Route::get('/all-category', [IndexController::class, 'filter_all'])->name('frontend.filter_all');

//contact us page
Route::get('/contact', [DarAlnuzumController::class, 'contact'])->name('dar.contact');
//about-us
Route::get('about-us', [IndexController::class, 'about_us'])->name('about.us');
//contact
Route::post('/contact-us', [IndexController::class, 'do_contact'])->name('frontend.do_contact');
// sent quote from guest user
Route::post('/get-quote', [IndexController::class, 'get_quote'])->name('get_quote');


// services
Route::get('services-all', [ServicesController::class, 'index']);
//show single service
Route::get('service-show/{id}', [DarAlnuzumController::class, 'show_service'])->name('service_show');
// show service by name as page service static
Route::get('/service-AUDIT-ASSURANCE-SERVICES', [IndexController::class, 'service1'])->name('service1');
Route::get('/service-VAT-Consultation', [IndexController::class, 'service2'])->name('service2');
Route::get('/service-FINANCIAL-ANALYSIS', [IndexController::class, 'service3'])->name('service3');
Route::get('/service-BUDGETING-FORECASTING', [IndexController::class, 'service4'])->name('service4');
Route::get('/service-PROJECT-REPORTS', [IndexController::class, 'service5'])->name('service5');
Route::get('/service-BUSINESS-VALUATION', [IndexController::class, 'service6'])->name('service6');
Route::get('/service-DUE-DILIGENCE', [IndexController::class, 'service7'])->name('service7');
Route::get('/service-HUMAN-RESOURCE', [IndexController::class, 'service8'])->name('service8');
Route::get('/service-ACCOUNTING-SERVICES', [IndexController::class, 'service9'])->name('service9');
Route::get('/service-LIQUIDATION-SERVICES', [IndexController::class, 'service10'])->name('service10');
//profile
Route::get('profile', [DarAlnuzumController::class, 'profile'])->name('profile')->middleware('auth');
//edit profile
Route::get('edit-profile', [DarAlnuzumController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
// to Show files that uploaded client
Route::get('view-contract/{user_id}/{file_name}', [ProfileController::class, 'view_contract'])->middleware('auth');
Route::get('view-trade-license/{user_id}/{file_name}', [ProfileController::class, 'view_trade_license'])->middleware('auth');
Route::get('view-visa/{user_id}/{file_name}', [ProfileController::class, 'view_Visa'])->middleware('auth');
Route::get('view-MOA/{user_id}/{file_name}', [ProfileController::class, 'view_MOA'])->middleware('auth');
// show all blogs
Route::get('blogs', [DarAlnuzumController::class, 'blogs'])->name('blogs');
// show blog by filter category name
Route::get('blog-filter/{slug}', [DarAlnuzumController::class, 'filter_blogs'])->name('blogs.filter');
Route::get('blog-all-categories', [DarAlnuzumController::class, 'filter_all_blogs'])->name('blogs.all_filter');
//show single blog
Route::get('blog/{slug}', [DarAlnuzumController::class, 'show_single_blog'])->name('single.blog');
Route::get('12', function () {
    $posts = Post::get();
    $users = User::get();
    $services = Service::get();
    return view('dar_al_nuzum.index55', compact('services', 'posts', 'users'));
})->name('single.blog1');

#################################################################################
//Route test multi partner
Route::get('test', function () {
    $categories = Category::get();
    return view('dar_al_nuzum.test', compact('categories'));
})->name('dar.test');
Route::post('test-post', function (Request $request) {


    $List_Classes = $request->List_Classes;

    try {

        foreach ($List_Classes as $List_Class) {

            $My_partner = new Partner();
            $My_partner->passport_number = $List_Class['passport_number'];
            $My_partner->expiry_date_passport = $List_Class['expiry_date_passport'];
            $My_partner->id_number = $List_Class['id_number'];
            $My_partner->expiry_date = $List_Class['expiry_date'];
            $My_partner->emirates_id = $List_Class['emirates_id'];
            $My_partner->user_id = auth()->user()->id;

            $My_partner->save();
        }

        return redirect()->route('dar.test');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
})->name('dar.test.post');
Route::fallback(function () {
    return redirect()->route('dar.home');
})->name('api.fallback');
#####################################################################################

Route::group(['middleware' => 'web'], function () {
    // Route::get('/', [IndexController::class, 'index'])->name('frontend.index');
    Route::get('/dar-alnuzum', [IndexController::class, 'index'])->name('frontend.index');

    Route::get('js/lang_ar.js', [ServiceController::class, 'vue_translate_ar'])->name('vue_translate_ar');
    Route::get('js/lang_en.js', [ServiceController::class, 'vue_translate_en'])->name('vue_translate_en');

    // Authentication Routes...
    Route::get('/login', [FrontendLoginController::class, 'showLoginForm'])->name('frontend.show_login_form');
    Route::post('login', [FrontendLoginController::class, 'login'])->name('frontend.login');
    Route::get('login/{provider}', [FrontendLoginController::class, 'redirectToProvider'])->name('frontend.social_login');
    Route::get('login/{provider}/callback', [FrontendLoginController::class, 'handleProviderCallback'])->name('frontend.social_login_callback');
    Route::post('logout', [FrontendLoginController::class, 'logout'])->name('frontend.logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('frontend.show_register_form');
    Route::post('register', [RegisterController::class, 'register'])->name('frontend.register');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    Route::get('/change-language/{locale}', [ServiceController::class, 'change_language'])->name('change_locale');

    Route::group(['middleware' => 'verified', 'as' => 'users.'], function () {

        //edit and update password
        Route::get('/edit-password', [FrontendUsersController::class, 'edit_password'])->name('edit_password');
        Route::post('/edit-password', [FrontendUsersController::class, 'update_password'])->name('update_password');
        //complete register
        Route::get('complete-register', [IndexController::class, 'complete_register'])->name('complete_register');

        Route::get('/user/notifications/get',  [FrontendNotificationsController::class, 'getNotifications']);
        Route::get('/dashboard', [FrontendUsersController::class, 'index'])->name('dashboard');
        Route::post('/user/notifications/read', [FrontendNotificationsController::class, 'markAsRead']);

        //complete user info
        Route::post('/complete-user-info/{id}', [FrontendUsersController::class, 'complete_user_info'])->name('complete_user_info');
        // edit profile user
        Route::post('/edit_profile', [FrontendUsersController::class, 'edit_profile_user'])->name('edit_profile_user');

        // financial report upload from admin or editor and client
        Route::post('/financial/{id}', [FinancialReportController::class, 'store'])->name('financial.store');
        //show pdf in financial report
        Route::get('View_file/{user_id}/{file_name}', [FinancialReportController::class, 'open_file']);
        // download PDF
        Route::get('download/{user_id}/{file_name}', [FinancialReportController::class, 'get_file']);
        //delete pdf
        Route::delete('delete_file/{id}', [FinancialReportController::class, 'destroy'])->name('delete_file');
        // show comment on financial report
        Route::get('comment-on/{id}', [FinancialReportController::class, 'show_financial_report'])->name('show_financial_report');
        Route::delete('delete_comment/{id}', [FinancialReportController::class, 'delete_comment'])->name('delete_comment');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Authentication Routes...
    Route::get('/login', [BackendLoginController::class, 'showLoginForm'])->name('show_login_form');
    Route::post('login', [BackendLoginController::class, 'login'])->name('login');
    Route::post('logout', [BackendLoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['roles', 'role:admin|editor']], function () {

        Route::any('/notifications/get', [BackendNotificationsController::class, 'getNotifications']);
        Route::any('/notifications/read', [BackendNotificationsController::class, 'markAsRead']);
        Route::get('/', [AdminController::class, 'index'])->name('index_route');
        Route::get('/index', [AdminController::class, 'index'])->name('index');
        Route::post('/posts/removeImage/{media_id}', [PostsController::class, 'removeImage'])->name('posts.media.destroy');
        Route::resource('posts', PostsController::class);

        Route::resource('post_categories', PostCategoriesController::class);
        // Route::resource('post_tags', PostTagsController::class);
        Route::resource('contact_us', ContactUsController::class);
        Route::resource('Quote', QuoteController::class);
        Route::post('/users/removeImage', [BackendUsersController::class, 'removeImage'])->name('users.remove_image');
        Route::resource('users',  BackendUsersController::class);

        Route::get('/show/user-status-order/{id}', [BackendUsersController::class, 'show_order'])->name('show_order');
        Route::get('clients-auditor', [BackendUsersController::class, 'get_users_editor'])->name('users_editor.index');
        Route::get('change-status',  [BackendUsersController::class, 'status_orders'])->name('change-status');
        Route::post('update-auditor-assign/{id}',  [BackendUsersController::class, 'update_assign_auditor'])->name('update_assign_auditor');

        //comment financial report
        Route::get('comment-on/{id}', [FinancialReportController::class, 'show_financial_report'])->name('show_financial_report');

        Route::post('users/under_processing/{id}', [BackendUsersController::class, 'order_under_processing'])->name('order.under_processing');
        Route::post('user1/accepted/{id}', [BackendUsersController::class, 'order_accepted'])->name('order.accepted');

        Route::post('/supervisors/removeImage', [SupervisorsController::class, 'removeImage'])->name('supervisors.remove_image');
        Route::resource('supervisors', SupervisorsController::class);
        Route::resource('settings', SettingsController::class);

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});

Route::get('/contact-us', [IndexController::class, 'contact'])->name('frontend.contact');

Route::post('auditor/comment/{id}', [FinancialReportController::class, 'store_comment'])->name('financial.store_comment');
