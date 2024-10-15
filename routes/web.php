<?php

use App\Http\Controllers\{GiftRequestController, HomeController, PDFController, TreeProfileController, TreeTimelineImageController};
use Illuminate\Support\Facades\{Auth, Route};


Route::get('/', [HomeController::class, 'index']);

Auth::routes();
Route::get('tree-profile/{uuid}', [PDFController::class, 'goToQRCodeTreePage']);

Route::middleware(['auth', 'checkUserType:admin'])->group(function () {
    Route::get('/download-certificate/{gift_req_id}', [PDFController::class, 'downloadPDF']);    

    Route::prefix('tree')->group(function () {
        Route::get('total-count', [TreeProfileController::class, 'countTotalTrees']);
        Route::get('total-assigned', [TreeProfileController::class, 'countTotalAssignedTrees']);

        Route::get('assigned', [TreeProfileController::class, 'showAssignedTrees']);
        Route::get('list', [TreeProfileController::class, 'index']);
        Route::get('create', [TreeProfileController::class, 'create']);
        Route::get('edit/{id}', [TreeProfileController::class, 'edit']);
        Route::put('update/{id}', [TreeProfileController::class, 'update']);
        Route::post('store', [TreeProfileController::class, 'store']);
    });

    Route::prefix('timeline')->group(function () {
        Route::get('show/{tree_id}', [TreeTimelineImageController::class, 'show']);
        Route::post('store', [TreeTimelineImageController::class, 'store']);
        Route::get('delete/{id}', [TreeTimelineImageController::class, 'destroy']);
    });

    Route::prefix('request')->group(function () {
        Route::get('total-pending', [GiftRequestController::class, 'countTotalPendingRequests']);

        Route::get('/index', [GiftRequestController::class, 'index']);
        Route::get('show-new', [GiftRequestController::class, 'showNewRequestsToAdmin']);
        Route::get('process/{id}', [GiftRequestController::class, 'processRequest']);
        Route::post('update-request', [GiftRequestController::class, 'updateRequestWithAddedTree']);
        Route::post('create', [GiftRequestController::class, 'create']);
    });
});

Route::middleware(['auth', 'checkUserType:user'])->prefix('request')->group(function () {
    Route::get('user-personal', [GiftRequestController::class, 'showUserPersonalRequestList']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('get-division-list', [HomeController::class, 'getDivisionList']);
    Route::post('get-district-list', [HomeController::class, 'getDistrictList']);
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::post('request/store', [GiftRequestController::class, 'store']);
});