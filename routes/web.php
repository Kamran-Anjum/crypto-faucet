<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// ==============================
// =========Admin Routes=========
// ==============================

Route::match(['get', 'post'], '/admin', [App\Http\Controllers\AdminController::class, 'login'])->name('adminlogin');

Route::match(['get', 'post'], '/admin/register', [App\Http\Controllers\AdminController::class, 'register'])->name('adminregister');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index']);

Route::group(['middleware' => ['role:admin']], function () {

    //change password
    Route::match(['get', 'post'], '/admin/change-password', [App\Http\Controllers\AdminController::class, 'change_password']);

    //admin logout
    Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('adminlogout');

    //about us route
    Route::get('/admin/view-about-us', [App\Http\Controllers\AboutController::class, 'viewAbout']);
    Route::get('/admin/view-about-us/{id}', [App\Http\Controllers\AboutController::class, 'viewAboutDetail']);
    Route::match(['get', 'post'], '/admin/add-about-us', [App\Http\Controllers\AboutController::class, 'addAbout']);
    Route::match(['get', 'post'], '/admin/edit-about-us/{id}', [App\Http\Controllers\AboutController::class, 'editAbout']);
    Route::get('/admin/delete-about-us/{id}', [App\Http\Controllers\AboutController::class, 'deleteAbout']);

    //contact route
    Route::get('/admin/view-contact-messages', [App\Http\Controllers\ContactController::class, 'viewContactMessage']);
    Route::get('/admin/view-contact-message/{id}', [App\Http\Controllers\ContactController::class, 'viewContactMessageDetail']);
    Route::get('/admin/delete-contact-message/{id}', [App\Http\Controllers\ContactController::class, 'deleteContactMessage']);

    //front footer route
    Route::get('/admin/view-front-footer-item', [App\Http\Controllers\FrontFooterController::class, 'viewFrontFooter']);
    Route::match(['get', 'post'], '/admin/add-front-footer-item', [App\Http\Controllers\FrontFooterController::class, 'addFrontFooter']);
    Route::match(['get', 'post'], '/admin/add-front-footer-item/{column_name}/{id}', [App\Http\Controllers\FrontFooterController::class, 'editFrontFooter']);
    Route::match(['get', 'post'], '/admin/edit-front-footer-item/{column_name}/{id}', [App\Http\Controllers\FrontFooterController::class, 'editFrontFooter']);
    Route::get('/admin/delete-front-footer-item/{column_name}/{id}', [App\Http\Controllers\FrontFooterController::class, 'deleteFrontFooter']);

    //meta tags route for SEO
    Route::get('/admin/view-meta-tags', [App\Http\Controllers\MetaTagController::class, 'viewMetaTag']);
    Route::match(['get', 'post'], '/admin/add-meta-tags', [App\Http\Controllers\MetaTagController::class, 'addMetaTag']);
    Route::match(['get', 'post'], '/admin/edit-meta-tags/{id}', [App\Http\Controllers\MetaTagController::class, 'editMetaTag']);
    Route::get('/admin/delete-meta-tag/{id}', [App\Http\Controllers\MetaTagController::class, 'deleteMetaTag']);

    //user route
    Route::get('/admin/view-users', [App\Http\Controllers\UserController::class, 'viewUser']);
    Route::get('/admin/view-user/{id}', [App\Http\Controllers\UserController::class, 'viewUserDetail']);
    Route::match(['get', 'post'], '/admin/create-user', [App\Http\Controllers\UserController::class, 'addUser']);
    Route::match(['get', 'post'], '/admin/edit-user/{id}', [App\Http\Controllers\UserController::class, 'editUser']);
    Route::post('/admin/user/change-password', [App\Http\Controllers\UserController::class, 'userChangePasswordAdmin']);
    Route::get('/admin/delete-user/{id}', [App\Http\Controllers\UserController::class, 'deleteUser']);

    //home about route
    Route::match(['get', 'post'], '/admin/edit-about-home', [App\Http\Controllers\AboutMainController::class, 'editAboutMain']);
    Route::get('/admin/delete-signature-image/{id}', [App\Http\Controllers\AboutMainController::class, 'deleteSignatureImage']);

    // app setting route
    Route::match(['get', 'post'], '/admin/edit-site-setting', [App\Http\Controllers\AppSettingController::class, 'editAppSetting']);

    // privacy policyy route
    Route::match(['get', 'post'], '/admin/edit-privacy-policy', [App\Http\Controllers\PrivacyPolicyController::class, 'editPrivacyPolicy']);

    // terms and conditions route
    Route::match(['get', 'post'], '/admin/edit-terms-and-conditions', [App\Http\Controllers\TermsAndConditionsController::class, 'editTermsAndCondition']);

    // FAUCET SETUP
    // timer route
    Route::match(['get', 'post'], '/admin/edit-timer', [App\Http\Controllers\TimerController::class, 'editTimer']);

    // set reward route
    Route::match(['get', 'post'], '/admin/edit-set-reward', [App\Http\Controllers\SetRewardController::class, 'editSetReward']);

    // per day limit route
    Route::match(['get', 'post'], '/admin/edit-per-day-limit', [App\Http\Controllers\PerDayLimitController::class, 'editPerDayLimit']);

    // referral commission route
    Route::match(['get', 'post'], '/admin/edit-referral-commision', [App\Http\Controllers\ReferralController::class, 'editReferralPercentage']);

    // PTC SETUP
    // exchange token limit route
    Route::match(['get', 'post'], '/admin/edit-exchange-token-limit', [App\Http\Controllers\ExchangeTokenLimitController::class, 'editExchangeTokenLimit']);

    // ptc duration route
    Route::get('/admin/view-ptc-durations', [App\Http\Controllers\PTCDurationController::class, 'viewPtcDuration']);
    Route::match(['get', 'post'], '/admin/add-ptc-duration', [App\Http\Controllers\PTCDurationController::class, 'addPtcDuration']);
    Route::match(['get', 'post'], '/admin/edit-ptc-duration/{id}', [App\Http\Controllers\PTCDurationController::class, 'editPtcDuration']);
    Route::get('/admin/delete-ptc-duration/{id}', [App\Http\Controllers\PTCDurationController::class, 'deletePtcDuration']);

    // ptc intervals route
    Route::get('/admin/view-ptc-intervals', [App\Http\Controllers\PTCIntervalController::class, 'viewPtcInterval']);
    Route::match(['get', 'post'], '/admin/add-ptc-interval', [App\Http\Controllers\PTCIntervalController::class, 'addPtcInterval']);
    Route::match(['get', 'post'], '/admin/edit-ptc-interval/{id}', [App\Http\Controllers\PTCIntervalController::class, 'editPtcInterval']);
    Route::get('/admin/delete-ptc-interval/{id}', [App\Http\Controllers\PTCIntervalController::class, 'deletePtcInterval']);

});

// ==============================
// ======Admin Routes End========
// ==============================
// -----------------------------------------------------------------------------------------
// ==============================
// =========User Routes==========
// ==============================

Route::match(['get', 'post'], '/login', [App\Http\Controllers\UserController::class, 'userLogin']);
Route::match(['get', 'post'], '/signup', [App\Http\Controllers\UserController::class, 'userSingup']);
Route::get('/account/activate/{id}/{slug}', [App\Http\Controllers\UserController::class, 'activateAccount']);

// forgot password
Route::match(['get', 'post'], '/forgot-password', [App\Http\Controllers\UserController::class, 'userForgotPasswordRequest']);
Route::match(['get', 'post'], '/reset-password/{id}/{slug?}', [App\Http\Controllers\UserController::class, 'userResetPassword']);

Route::group(['middleware' => ['role:user']], function () {

    Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'userProfile']);
    Route::match(['get', 'post'], '/user/change-password', [App\Http\Controllers\UserController::class, 'userChangePassword']);
    Route::get('/user/logout', [App\Http\Controllers\UserController::class, 'userLogout']);

    // user reward claims
    Route::match(['get', 'post'], '/user/faucet', [App\Http\Controllers\UserRewardClaimController::class, 'userFaucet']);

    // user referral
    Route::get('/user/referral', [App\Http\Controllers\ReferralController::class, 'userReferrals']);

    // user withdrawal
    Route::match(['get', 'post'], 'user/withdrawal', [App\Http\Controllers\WithdrawalController::class, 'withdrawal']);

    Route::get('/user/token-to-amount/{token}', [App\Http\Controllers\WithDrawalController::class, 'userTokenToWithdrawal']);

});

// ==============================
// =======User Routes End========
// ==============================
// -----------------------------------------------------------------------------------------
// ==============================
// ======Frontend Routes=========
// ==============================

Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/ref={ref_code}', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/about', [App\Http\Controllers\FrontController::class, 'about']);
Route::match(['get', 'post'], '/contact', [App\Http\Controllers\FrontController::class, 'contact']);
Route::get('/terms-and-conditions', [App\Http\Controllers\FrontController::class, 'termsAndCondition']);
Route::get('/privacy-policy', [App\Http\Controllers\FrontController::class, 'privacyPolicy']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
