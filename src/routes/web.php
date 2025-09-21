<?php

use App\Http\Controllers\DispatchController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;


Route::get("/admin/login", [LoginController::class, "login"])->name("login");
Route::post("/admin/login", [LoginController::class, "check"])->name("check");

Route::middleware(["auth", "cache.headers:no_store;max_age=0"])->group(function () {
    Route::get("/admin", [LoginController::class, "dash"])->name("dash");
    // logoutは「get」メソッド にしよう！！！！
    Route::get("/admin/logout", [LoginController::class, "logout"])->name("logout");

    //  「as」ですよ！！！
    Route::as("event.")->group(function () {
        Route::get("/admin/event", [EventController::class, "index"])->name("index");
        Route::get("/admin/event/create", [EventController::class, "create"])->name("create");
        Route::post("/admin/event", [EventController::class, "store"])->name("store");
        Route::get("/admin/event/{id}", [EventController::class, "edit"])->name("edit");
        Route::patch("/admin/event/{id}", [EventController::class, "update"])->name("update");
        Route::delete("/admin/event/{id}", [EventController::class, "destroy"])->name("destroy");
    });

    Route::as("worker.")->group(function () {
        Route::get("/admin/worker", [WorkerController::class, "index"])->name("index");
        Route::get("/admin/worker/create", [WorkerController::class, "create"])->name("create");
        Route::post("/admin/worker", [WorkerController::class, "store"])->name("store");
        Route::delete("/admin/worker/{id}", [WorkerController::class, "destroy"])->name("destroy");
    });

    Route::as("dispatch.")->group(function () {
        Route::get("/admin/dispatch", [DispatchController::class, "index"])->name("index");
        Route::get("/admin/dispatch/create", [DispatchController::class, "create"])->name("create");
        Route::post("/admin/dispatch", [DispatchController::class, "store"])->name("store");
        Route::delete("/admin/dispatch/{id}", [DispatchController::class, "destroy"])->name("destroy");
    });
});
