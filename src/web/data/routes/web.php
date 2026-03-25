<?php

use App\Http\Controllers\PortfolioController;
use App\Models\AboutPage;
use App\Models\ContactPage;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'))->name('home');
Route::get('/about', fn () => view('about', ['about' => AboutPage::content()]))->name('about');
Route::get('/contact', fn () => view('contact', ['contact' => ContactPage::content()]))->name('contact');
Route::get('/become-volunteers', fn () => view('become-volunteers'))->name('become-volunteers');
Route::get('/blog', fn () => view('blog'))->name('blog');
Route::get('/blog-slider', fn () => view('blog-slider'))->name('blog-slider');
Route::get('/blog-details', fn () => view('blog-details'))->name('blog-details');
Route::get('/blog-clasic', fn () => view('blog-clasic'))->name('blog-clasic');
Route::get('/causes', fn () => view('causes'))->name('causes');
Route::get('/cause-details', fn () => view('cause-details'))->name('cause-details');
Route::get('/donate', fn () => view('donate'))->name('donate');
Route::get('/events', fn () => view('events'))->name('events');
Route::get('/events-slider', fn () => view('events-slider'))->name('events-slider');
Route::get('/event-details', fn () => view('event-details'))->name('event-details');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio-details/{portfolio?}', [PortfolioController::class, 'show'])->name('portfolio-details');
Route::get('/volunteers', fn () => view('volunteers'))->name('volunteers');
Route::get('/faqs', fn () => view('faqs'))->name('faqs');
