<?php

use App\Http\Middleware\SP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserInterface;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->middleware(['auth', 'verified'])->name('dashboard');
    

Route::middleware(['auth'])->group(function () {


  Route::get('/show',[UserInterface::class,'show']);
  Route::resource('/firm',FirmController::class)->middleware(SP::class);
  Route::patch('firm/mapupdate/{id}', [FirmController::class, 'mapupdate'])->middleware(SP::class);
  Route::post('firm/updateprofilepic',[FirmController::class,'updateprofilepic'])->middleware(SP::class);
  Route::resource('/schedule',ScheduleController::class)->middleware(SP::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard',function(){

    $user=Auth::user();
    // dd($user->getRoleNames());
   switch($user->getRoleNames()[0]){
    case 'admin': return "ye admin wala hai";
    case 'client':return app(UserInterface::class)->show();
    case 'service_provider':
       
        if (count($user->firm)>0)
        return app(FirmController::class)->index();

        return app(FirmController::class)->create();
   }

})->middleware('auth')->name('dashboard');


        
    

require __DIR__.'/auth.php';
