<?php

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
    Route::get('/download-invoice', [\App\Http\Controllers\Auth\ClientController::class, 'downloadInvoice'])->name('downloadInvoice');
    Route::get('/view-invoice', [\App\Http\Controllers\Auth\ClientController::class, 'viewInvoice'])->name('viewInvoice');
    Route::get('/invoice', [\App\Http\Controllers\Auth\ClientController::class, 'clientInvoice'])->name('clientInvoice');
    Route::get('/job', [\App\Http\Controllers\Auth\ClientController::class, 'clientJob'])->name('clientJob');
    Route::get('/view-report/{id}', [\App\Http\Controllers\Auth\ClientController::class, 'viewReport'])->name('viewReport');
    Route::get('/client-terminal', [\App\Http\Controllers\Auth\ClientController::class, 'clientTermina'])->name('client.termina');
    Route::get('/add-client-termina', [\App\Http\Controllers\Auth\ClientController::class, 'AddClientTermina'])->name('client.addTermina');
    Route::post('/save-Termina', [\App\Http\Controllers\Auth\ClientController::class, 'saveTermina'])->name('client.saveTermina');
    Route::get('/job-report/{id}', [\App\Http\Controllers\Auth\ClientController::class, 'jobReport'])->name('job.report');
    Route::get('/jobs', [\App\Http\Controllers\Auth\ClientController::class, 'jobs']);
    Route::get('/generate-pdf', [\App\Http\Controllers\Auth\ClientController::class, 'generatePdf'])->name('generatePdf');

}) ;



Route::prefix('terminal')->group(function() {
    Route::get('/login',[\App\Http\Controllers\Auth\TerminalLoginController::class, 'showLoginForm'])->name('terminal.login');
    Route::post('/login', [\App\Http\Controllers\Auth\TerminalLoginController::class, 'login'])->name('terminal.login.submit');
    Route::get('logout/', [\App\Http\Controllers\Auth\TerminalLoginController::class, 'logout'])->name('terminal.logout');
    Route::get('/', [\App\Http\Controllers\Auth\TerminalController::class, 'index'])->name('terminal.dashboard');
    Route::get('job-history/', [\App\Http\Controllers\Auth\TerminalController::class, 'jobHistory'])->name('terminal.jobHistory');
}) ;





Route::get('/', [App\Http\Controllers\PageNavigationController::class, 'index'])->name('welcome');
Route::get('/see-all-plans', [\App\Http\Controllers\PageNavigationController::class, 'allPlans'])->name('allPlans');
Route::get('/plan-detail/{id}', [\App\Http\Controllers\PageNavigationController::class, 'singlePlanDetail'])->name('singlePlanDetail');
Route::get('/buy-plan/{id}', [\App\Http\Controllers\PageNavigationController::class, 'buyPlan'])->name('buyPlan');
Route::post('/acknowledge-plan', [\App\Http\Controllers\PageNavigationController::class, 'acknowledgePlan'])->name('acknowledgePlan');
Route::post('/pay-and-register', [\App\Http\Controllers\PageNavigationController::class, 'payAndRegister'])->name('payAndRegister');
Route::get('/thankyou', [\App\Http\Controllers\PageNavigationController::class, 'thankyou'])->name('thankyou');
Route::get('/get-plan-price', [\App\Http\Controllers\PageNavigationController::class, 'getPlanPrice'])->name('getPlanPrice');

