<?php

// use App\Http\Controllers\PlanController;
// use App\Http\Controllers\TestController;
use App\Models\Plan;
use Illuminate\Support\Facades\Route;

use function GuzzleHttp\Promise\all;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::resource('/test',TestController::class);
    Route::resource('/plan',PlanController::class);
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('client')->group(function() {
    Route::get('/login',[\App\Http\Controllers\Auth\ClientLoginController::class, 'showLoginForm'])->name('client.login');
    Route::post('/login', [\App\Http\Controllers\Auth\ClientLoginController::class, 'login'])->name('client.login.submit');
    Route::get('logout/', [\App\Http\Controllers\Auth\ClientLoginController::class, 'logout'])->name('client.logout');
    Route::get('/', [\App\Http\Controllers\Auth\ClientController::class, 'index'])->name('client.dashboard');
}) ;

Route::prefix('terminal')->group(function() {
    Route::get('/login',[\App\Http\Controllers\Auth\TerminalLoginController::class, 'showLoginForm'])->name('terminal.login');
    Route::post('/login', [\App\Http\Controllers\Auth\TerminalLoginController::class, 'login'])->name('terminal.login.submit');
    Route::get('logout/', [\App\Http\Controllers\Auth\TerminalLoginController::class, 'logout'])->name('terminal.logout');
    Route::get('/', [\App\Http\Controllers\Auth\TerminalController::class, 'index'])->name('terminal.dashboard');
}) ;

Route::get('/', [App\Http\Controllers\PageNavigationController::class, 'index'])->name('welcome');
Route::get('/see-all-plans', [\App\Http\Controllers\PageNavigationController::class, 'allPlans'])->name('allPlans');
Route::get('/plan-detail/{id}', [\App\Http\Controllers\PageNavigationController::class, 'singlePlanDetail'])->name('singlePlanDetail');
Route::get('/buy-plan/{id}', [\App\Http\Controllers\PageNavigationController::class, 'buyPlan'])->name('buyPlan');
Route::post('/acknowledge-plan', [\App\Http\Controllers\PageNavigationController::class, 'acknowledgePlan'])->name('acknowledgePlan');
Route::post('/pay-and-register', [\App\Http\Controllers\PageNavigationController::class, 'payAndRegister'])->name('payAndRegister');
Route::get('/thankyou', [\App\Http\Controllers\PageNavigationController::class, 'thankyou'])->name('thankyou');

Route::get('/send-mail', [\App\Http\Controllers\MailController::class, 'sendEmail'])->name('sendEmail');



Route::get('/get-plan-price', [\App\Http\Controllers\PageNavigationController::class, 'getPlanPrice'])->name('getPlanPrice');
