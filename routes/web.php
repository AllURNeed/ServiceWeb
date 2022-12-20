<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\front\FrontController;
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



// front end all routes

Route::get('/',[FrontController::class,'LoadAll']);

Route::get('Admin/login',[AdminController::class,'LoginPage'])->name('loginPage');
Route::POST('Admin/login',[AdminController::class,'login'])->name('login');

// customer query
Route::POST('/support',[FrontController::class,'query'])->name('support');

Route::group(['prefix' => 'Admin',  'middleware' => ['Login','prevent-back-history']], function()
{
    //All the routes that belongs to the group goes here
    
    // dashboard
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    // Logout
    
    Route::get('logout',[AdminController::class,'logout']);

    // add company information
    Route::get('/Addinfo',[AdminController::class,'addinfo']);
    Route::POST('/save/addinfo',[AdminController::class,'SaveInfo'])->name('add_info');

    // add slider
    Route::Get('slider',[AdminController::class,'SliderPage']);
    Route::post('save/slider',[AdminController::class,'AddSlider'])->name('add_slider');

    // slider edit and delete routes
    Route::get('SliderDel/{id}',[AdminController::class,'DelSlider']);
    Route::get('SliderEdit/{id}',[AdminController::class,'EditSlider']);
    
    Route::POST('EditSlider',[AdminController::class,'EditSubmit'])->name('edit_slider');

    // Add Technology Services
      Route::Get('/service',[AdminController::class,'AddServicePage']);
     Route::post('AddService',[AdminController::class,'SaveSerice'])->name('add_service');
      // Edit and delete of service
    Route::get('ServiceDel/{id}',[AdminController::class,'DelService']);
    Route::get('ServiceEdit/{id}',[AdminController::class,'EditService']);
    Route::POST('EditService',[AdminController::class,'EditServiceSubmit'])->name('edit_service');

    // plans
    Route::Get('/Plans',[AdminController::class,'PlansPage']);
    Route::post('AddPlans',[AdminController::class,'AddPlans'])->name('add_plans');
    //  delete of plan
    Route::get('PlanDel/{id}',[AdminController::class,'DelPlan']);

    // create plan list
    Route::get('FPlans',[AdminController::class,'planlist']);
    Route::POST('AddFPlans',[AdminController::class,'Addplanlist'])->name('add_Fplans');
    Route::get('DelListPlan/{id}',[AdminController::class,'DelListPlan']);

    // FAQ 
    Route::Get('Faq',[AdminController::class,'faq']);
    Route::POST('add_faq',[AdminController::class,'add_faq'])->name('add_faq');
    Route::get('delfaq/{id}',[AdminController::class,'delfaq']);

    //Testimonials
    Route::Get('Testimonials',[AdminController::class,'Testimonials']);
    Route::POST('add_Testimonials',[AdminController::class,'Testimonials_add'])->name('add_Testimonials');
    Route::Get('delclient/{id}',[AdminController::class,'delclient']);
    Route::POST('edit_Testimonials',[AdminController::class,'edit_Testimonials'])->name('edit_Testimonials');

    // Team
    Route::Get('team',[AdminController::class,'team']);
    Route::POST('team',[AdminController::class,'AddTeam'])->name('add_team');
    Route::Get('teamdlt/{id}',[AdminController::class,'teamdlt']);
    Route::POST('edit_team',[AdminController::class,'edit_team'])->name('edit_team');

    // client image
    Route::POST('ajax',[AjaxController::class,'AjaxRequest']);

    // incoming message
    Route::Get('message',[AdminController::class,'message']);
});





