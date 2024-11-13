<?php

use App\Http\Controllers\API\DashbordController;
use App\Http\Controllers\API\FolderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('folder-all', [DashbordController::class, 'get']);

    Route::get('folder', [FolderController::class, 'get']);
    Route::post('folder/store', [FolderController::class, 'store']);
    Route::delete('folder/delete/{id}', [FolderController::class, 'destroy']);

    Route::get('folder/sub/{id}', [FolderController::class, 'getSub']);
    Route::post('folder/sub/store', [FolderController::class, 'storeSub']);
    Route::delete('folder/sub/delete/{id}', [FolderController::class, 'destroySub']);
});
