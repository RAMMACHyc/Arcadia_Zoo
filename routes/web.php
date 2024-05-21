<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShowServicesController;
use App\Http\Controllers\HabitatController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\VeterinaireAvisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowAnimalsController;
use App\Http\Controllers\ShowHabitatsController;
use App\Http\Controllers\alimentation_quotidienneController;
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

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('accueil');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/habitat', [ShowHabitatsController::class, 'index'])->name('habitat');

Route::get('/', [ShowAnimalsController::class, 'index'])->name('accueil');

Route::get('/service', [ShowServicesController::class, 'index'])->name('service');
Route::post('/service', [ShowServicesController::class, 'store'])->name('service.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::post('avis/{avi}/toggle-visibility', [AvisController::class, 'toggleVisibility'])->name('avis.toggle-visibility');
    Route::get('/services/{service}/avis/create', [AvisController::class, 'create'])->name('avis.create');
});


Route::middleware(['auth', 'role:admin,veterinaire,employe'])->group(function () {
    Route::resource('animals', AnimalController::class);    
    Route::resource('alimentation_quotidienne', alimentation_quotidienneController::class);
    Route::resource('habitats', HabitatController::class);
    Route::resource('veterinaire-avis', VeterinaireAvisController::class);

});
Route::middleware(['auth', 'role:admin,employe'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('avis', AvisController::class);
});