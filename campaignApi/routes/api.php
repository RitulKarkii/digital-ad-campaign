<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CampaignController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/page',[PageController::class,'page']);
Route::get('/getPageData',[PageController::class,'GetPageData']);

    Route::post('/campaign',[CampaignController::class,'campaign']);
    Route::get('/getCampaign',[CampaignController::class,'getCampaign']);
    Route::get('/campaign/{id}',[CampaignController::class,'show']);
    Route::post('/updateCampaign/{id}',[CampaignController::class,'edit']);
    Route::delete('/delete/{id}',[CampaignController::class,'delete']);


