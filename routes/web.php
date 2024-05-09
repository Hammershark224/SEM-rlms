<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ChangePassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::view('/dashboard', 'ManageUser.dashboard')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/UserManagement',[UserController::class, 'index'])->name('user.manage');
	Route::post('/UserManagement',[UserController::class, 'index'])->name('user.manageView');
	Route::get('/UserManagement/CreateUser',[UserController::class, 'create'])->name('user.create');
	Route::post('/UserManagement/Create',[UserController::class, 'store'])->name('user.store');
	Route::get('/UserManagement/{id}/View',[UserController::class, 'show'])->name('user.view');
	Route::get('/UserManagement/{id}/Edit',[UserController::class, 'edit'])->name('user.edit');
	Route::post('/UserManagement/{id}/Update',[UserController::class, 'update'])->name('user.update');
	Route::get('/UserManagement/{id}/Delete',[UserController::class, 'delete'])->name('user.delete');
});

Route::get('/UserProfile',[UserProfileController::class, 'show'])->name('userprofile');
Route::post('/UserProfile/Update',[UserProfileController::class, 'update'])->name('profile.update');
Route::get("/Complaint", [ComplaintController::class, 'index'])->name("ManageComplaint.Complaint");
Route::get("/Complaint/CreateComplaint", [ComplaintController::class, 'create'])->name("ManageComplaint.CreateComplaint");
Route::get("/submit-complaint", [ComplaintController::class, 'create'])->name("ManageComplaint.CreateComplaint");;
Route::post("/submit-complaint", [ComplaintController::class, 'store'])->name("ManageComplaint.submit-complaint");;
Route::get('/complaints/{complaint}/edit', [ComplaintController::class, 'edit'])->name('ManageComplaint.EditComplaint');
Route::put('/complaints/{complaint}', [ComplaintController::class, 'update'])->name('ManageComplaint.update-complaint');
Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');

Route::get("/Response", [ResponseController::class, 'index'])->name("ManageResponse.Response");
Route::get('/LabAsset',[AssetController::class, 'index'])->name('ManageLabAsset.LabAsset');
Route::get('/LabAsset/create',[AssetController::class, 'create'])->name('ManageLabAsset.CreateLabAsset');
Route::get('/store',[AssetController::class, 'create'])->name('ManageLabAsset.create');
Route::post('/store',[AssetController::class, 'store'])->name('ManageLabAsset.store');
Route::delete('LabAsset/{assetDetail}', [AssetController::class, 'destroy'])->name('assets.destroy');

Route::get('/ViewLabAssetTech',[AssetController::class, 'index2'])->name('ManageLabAsset.ViewLabAssetTech');
Route::get('/ViewLabAssetTech/{assetDetails}/edit', [AssetController::class, 'edit'])->name('ManageLabAsset.edit');
Route::put('/ViewLabAssetTech/{assetDetails}', [AssetController::class, 'update'])->name('ManageLabAsset.update');