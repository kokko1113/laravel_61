<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/events",[ApiController::class,"getEvent"])->name("getEvent");
Route::post("/events",[ApiController::class,"postDispatch"])->name("postDispatch");
