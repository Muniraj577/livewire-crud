<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PermissionController as AdminPermissionController;

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
    return view('welcome');
});

// Route::group(["middleware" => ["auth", "checkPermission"]], function () {
Route::group(["prefix" => "admin/", "as" => "admin."], function () {
    Route::get("dashboard", [AdminDashboardController::class, "dashboard"])->name("dashboard");

    Route::group(["prefix" => "permission/", "as" => "permission."], function () {
        Route::get("", [AdminPermissionController::class, "index"])->name("index");
        Route::get("create", [AdminPermissionController::class, "create"])->name("create");
        Route::post("store", [AdminPermissionController::class, "store"])->name("store");
    });

});
// });