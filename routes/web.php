<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxpayerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\ReportController;
 

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

Route::get('/', function () {
    return view('Login');
});
 
Route::get('/Color', function () {
    return view('Color');
});
// Route::get('barangays', [BarangaysController::class,'index'])->name('barangays.index');;
// Route::get('Schools', [SchoolController::class,'index'])->name('Schools.index');;
// Route::get('Precincts', [PrecinctController::class,'index'])->name('Precincts.index');;
// Route::get('Watchers', [WatchersController::class,'index'])->name('Watchers.index');;
// Route::get('Candidates', [CandidateController::class,'index'])->name('Candidates.index');;
// Route::get('VotingTransactions', [VotingTransactionController::class,'index'])->name('VotingTransaction.index');;
// Route::get('TransactionLog', [WatcherslogController::class,'index'])->name('Watcherslog.index');;
// Route::get('test', [ReportController::class,'test'])->name('ReportController.test');;
// Route::get('reset', [VotingTransactionController::class,'reset'])->name('ReportController.reset');;
// Route::get('Blue', [WatcherslogController::class,'Blue'])->name('Watcherslog.Blue');;
// Route::get('White', [WatcherslogController::class,'White'])->name('Watcherslog.White');;
// Route::get('Yellow', [WatcherslogController::class,'Yellow'])->name('Watcherslog.Yellow');;
// Route::get('Red', [WatcherslogController::class,'Red'])->name('Watcherslog.Red');;

Route::get('Taxpayers', [TaxpayerController::class,'index'])->name('taxpayers.index');;
Route::post('/taxpayer/confirm/{id}', [TaxpayerController::class, 'confirm'])->name('taxpayer.confirm');
Route::post('/taxpayer/update-guest', [TaxpayerController::class, 'updateGuest'])->name('taxpayer.updateGuest');
Route::get('Reports', [ReportController::class,'index'])->name('ReportController.index');;

Route::post('login', [LoginController::class,'authenticate'])->name('login.authenticate');;
Route::post('logout', [LoginController::class,'logout'])->name('login.logout');;
Route::get('userinput', [UserInfoController::class,'index'])->name('login.get');;
//Route::post('UpdateVote', [UserInfoController::class,'UpdateVote'])->name('user.update');;