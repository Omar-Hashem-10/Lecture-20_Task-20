<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('site.home.index');
})->name("home.index");

Route::get('/home', function () {
    return view('site.home.index');
})->name("home.index");

Route::get('/about', function () {
    return view('site.about.index');
})->name("about.index");

Route::get('/contact', function () {
    return view('site.contact.index');
})->name("contact.index");

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route::get('/products/{product}/show', [ProductController::class, 'show'])->name('products.show');

Route::resource('products', ProductController::class);

Route::prefix('demo')->group(function() {
    Route::get('/redirect', function() {
        return redirect('contact');
    });

    Route::get('/back', function() {
        return redirect()->back();
    });

    Route::get('/named-route', function() {
        return redirect()->route('about.index');
    });

    Route::get('/away', function() {
        return redirect()->away('https://google.com');
    });

    Route::get('/json', function() {

        $products = [
            [
                'title'         => 'product 1',
                'description'   => 'this description for product number 1',
                'price'         => 200,
                'offer'         => 100
            ],
            [
                'title'         => 'product 2',
                'description'   => 'this description for product number 2',
                'price'         => 400,
                'offer'         => 300
            ],
            [
                'title'         => 'product 3',
                'description'   => 'this description for product number 3',
                'price'         => 500
            ]
            ];

        return response()->json($products);
    });

    Route::get('/download', function() {
        return response()->download(public_path('Untitled document.pdf'), 'unknown.pdf');
    });
});

Route::get('/responses', function() {

    $products = [
        [
            'title'         => 'product 1',
            'description'   => 'this description for product number 1',
            'price'         => 200,
            'offer'         => 100
        ],
        [
            'title'         => 'product 2',
            'description'   => 'this description for product number 2',
            'price'         => 400,
            'offer'         => 300
        ],
        [
            'title'         => 'product 3',
            'description'   => 'this description for product number 3',
            'price'         => 500
        ]
        ];

        return response($products, 201)
        ->header('Content-Type', 'text/html')
        ->cookie('NAME', 'Omar', 60 * 60);
});



