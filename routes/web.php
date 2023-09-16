<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangContoller;
use App\Http\Controllers\PortfiloController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\About;
use App\Models\Message;
use App\Models\Portfilo;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

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
    
    $portfilo=Portfilo::paginate(6);
    $service=Service::paginate(3);
    $team=Team::paginate(3);
    $abouts=About::paginate(6);
    return view('index',compact('portfilo','service','team','abouts'));
})->middleware('auth');



Route::get('/dashbord', function () {
    $total_service  = count(Service::select('id')->get());
    $teams=count(Team::select('id')->get());
    $Portfilos=count(Portfilo::select('id')->get());
    $abouts=count(About::select('id')->get());
    return view('dashbord.index',compact('total_service','teams','Portfilos','abouts'));
})->name('dashbord')->middleware('auth');


//About
Route::resource('abouts',AboutController::class)->middleware('auth');
//About
Route::resource('messages',HomeController::class)->middleware('auth');
//Service
Route::resource('services',ServiceController::class)->middleware('auth');

//Team
Route::resource('teams',TeamController::class)->middleware('auth');

//Porfilo
Route::resource('portfilos',PortfiloController::class)->middleware('auth');
Route::resource('users',UserController::class)->middleware('auth');

Route::get('/messages',function(){
    $messages=Message::get();

return view('dashbord.Message.index',compact('messages'));
})->name('messages')->middleware('auth');




Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');



Route::get('/login',[LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'store']);