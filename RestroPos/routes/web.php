<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LiveSearch;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveSearchCustomer;
use App\Models\User;

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








Route::any('/', [CustomerController::class, 'customer'])->middleware('isLogged');
Route::any('/customer', [CustomerController::class, 'customer'])->name('customer')->middleware('isLogged');

Route::any('/edit', [CustomerController::class, 'editcustomer'])->name('editcustomer')->middleware('isLogged');
Route::any('add', [CustomerController::class, 'addCustomer'])->name('addUser')->middleware('isLogged');
Route::any('delete/{user_id?}', [CustomerController::class, 'deleteCustomer'])->name('deleteUser')->middleware('isLogged');
Route::any('edit/{user_id?}', [CustomerController::class, 'editCustomer'])->name('editUser');
Route::any('edit_action', [CustomerController::class, 'editAction'])->name('editActionUser')->middleware('isLogged');


Route::any('/items', [ItemController::class, 'item'])->name('items')->middleware('isLogged');

Route::any('/edititem', [ItemController::class, 'edit'])->name('edit')->middleware('isLogged');
Route::any('additem', [ItemController::class, 'addItem'])->name('addItem')->middleware('isLogged');
Route::any('deleteitem/{user_id?}', [ItemController::class, 'deleteItem'])->name('deleteItem');
Route::any('edititem/{user_id?}', [ItemController::class, 'editItem'])->name('editItem');
Route::any('edit_action_item', [ItemController::class, 'editActionItem'])->name('editActionItem')->middleware('isLogged');



Route::get('/live_search/action', [LiveSearch::class, 'action'])->name('live_search.action')->middleware('isLogged');
Route::get('/live_search_customer/searchAction', [LiveSearchCustomer::class, 'searchAction'])->name('live_search_customer.searchAction')->middleware('isLogged');


Route::get('/login', [UserAuthController::class, 'login']);
Route::get('/register', [UserAuthController::class, 'register']);
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');
Route::get('home', [UserAuthController::class, 'homedata'])->middleware('isLogged');
//{{$LoggedUserInfo->firstname}}
Route::get('logout', [UserAuthController::class, 'logout'])->middleware('isLogged');

//Route::get('/home', [HomeController::class, 'home'])->middleware('isLogged');

