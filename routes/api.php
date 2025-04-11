<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FirmController;
Route::resource('/firms',FirmController::class);


?>

