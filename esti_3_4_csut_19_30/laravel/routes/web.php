<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\PostController;

use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('posts.index');
});

Route::get('/posts/{id}/attachment', [
    PostController::class,
    'attachment',
])->name('posts.attachment');

// Resource route létrehozása a posts név köré (/posts /posts/id, stb lesz)
// A route-ok megtekinthetők a php artisan route:list paranccsal
Route::resource('posts', PostController::class);

// Category
Route::get('/categories/create', function () {
    return view('categories.create');
})->name('categories.create');

Route::post('/categories/store', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|min:2',
        'bg-color' => 'required|regex:/^#([a-fA-F0-9]){8}$/',
        'text-color' => 'required|regex:/^#([a-fA-F0-9]){8}$/',
    ], [
        'required' => 'A(z) :attribute mező megadása kötelező!',
        'name.required' => 'A név megadása kötelező!',
    ]);
    Category::create([
        'name' => $data['name'],
        'bg_color' => $data['bg-color'],
        'text_color' => $data['text-color'],
    ]);
})->name('categories.store');

// Post
/*Route::get('/posts/create', function () {
    return view('posts.create');
})->name('posts.create');

Route::post('/posts/store', function (Request $request) {
    $request->validate([
        'title' => 'required|min:2',
        'text' => 'required|min:5',
        'categories.*' => 'integer|distinct', // TODO! Adatb esetén exists
    ]);
})->name('posts.store');
*/

// ----
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
