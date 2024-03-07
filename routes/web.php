<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UploadVideo;
use App\Livewire\Home;
use App\Livewire\Recommendations;
use App\Livewire\Trending;
use App\Http\Controllers\VideoController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Home::class
    )->name('dashboard');
});
Route::get('/dashboard', Home::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/trending', Trending::class)->middleware(['auth', 'verified'])->name('trending');
Route::get('/recommendations', Recommendations::class)->middleware(['auth', 'verified'])->name('recommendations');
Route::post('/video/upload', [VideoController::class, 'store'])->middleware(['auth', 'verified'])->name('video.upload');
// Route::post('/message', [MessageController::class, 'sendMessage']);

Route::get('/upload-video', UploadVideo::class)->name('upload-video');
