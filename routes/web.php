<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxFormController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('form', [AjaxFormController::class, 'index']);
Route::post('save', [AjaxFormController::class, 'store']);
