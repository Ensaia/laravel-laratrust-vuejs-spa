<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AuthController;

Route::post('/sanctum/token', TokenController::class);

Route::get('/prayer-times', [\App\Http\Controllers\PrayerTimesController::class, 'index']);


Route::controller(\App\Http\Controllers\HomeController::class)->group(function(){
  Route::get('/home/data','index');
});
Route::controller(\App\Http\Controllers\DashboardController::class)->group(function(){
  Route::get('/dashboard/data','index');
});


// Route::middleware([
//     'auth:sanctum','verified'
// ])->group(function () {

    Route::get('user/auth', AuthController::class);

    /*
    * users
     */

    Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::post('/user/create', 'store');
        Route::get('/user/show/{user}', 'show');
        Route::put('/user/update/{user}', 'update');
        Route::delete('/user/destroy/{user}', 'destroy');
    });
    /*
    * user search
     */
    Route::controller(\App\Http\Controllers\SearchController::class)->group(function () {
        Route::post('/user/search', 'userSearch');
    });
    /*
    * posts
     */
     Route::controller(\App\Http\Controllers\PostController::class)->group(function () {
         Route::get('/posts', 'index');
         Route::post('/post/create', 'store');
         Route::get('/post/edit/{post}', 'edit');
         Route::put('/post/update/{post}', 'update');
         Route::delete('/post/destroy/{post}', 'destroy');
     });
    /*
     * laratrust
     */

    /*
     * Roles
     */
    Route::controller(\App\Http\Controllers\Laratrust\RoleController::class)->group(function () {
        Route::get('/roles', 'index');
        Route::post('/role/create', 'store');
        Route::get('/role/edit/{role}', 'edit');
        Route::put('/role/update/{role}', 'update');
        Route::delete('/role/destroy/{role}', 'destroy');
    });
    /*
     * Permissions
     */
    Route::controller(\App\Http\Controllers\Laratrust\PermissionController::class)->group(function () {
        Route::get('/permissions', 'index');
        Route::post('/permission/create', 'store');
        Route::get('/permission/edit/{permission}', 'edit');
        Route::put('/permission/update/{permission}', 'update');
        Route::delete('/permission/destroy/{permission}', 'destroy');
    });
    /*
     * Role Permission
     */
    Route::controller(\App\Http\Controllers\Laratrust\RolePermissionsController::class)->group(function () {
        Route::get('/role/{role}/permissions', 'index');
        Route::post('/role/{role}/permission/create', 'store');
        // Route::get('/role/show/{role}', 'show');
        // Route::put('/role/update/{role}', 'update');
        Route::delete('/role/{role}/permission/{permission}/destroy', 'destroy');
    });
    /*
     * User Roles
     */
    Route::controller(\App\Http\Controllers\Laratrust\UserRoleController::class)->group(function () {
        Route::get('/user/{user}/roles', 'index');
        Route::post('/user/{user}/role/create', 'store');
        // Route::get('/permission/show/{permission}', 'show');
        // Route::put('/permission/update/{permission}', 'update');
        Route::delete('/user/{user}/role/{role}/destroy', 'destroy');
    });
    /*
     * User Permissions
     */
    Route::controller(\App\Http\Controllers\Laratrust\UserPermissionController::class)->group(function () {
        // Route::get('/permissions', 'index');
        Route::get('/user/{user}/permissions', 'index');
        Route::post('/user/{user}/permission/create', 'store');
        // Route::get('/permission/show/{permission}', 'show');
        // Route::put('/permission/update/{permission}', 'update');
        Route::delete('/user/{user}/permission/{permission}/destroy', 'destroy');
    });
                                /*
                                 * laratrust
                                 */
    /**
     *
     */

// });
