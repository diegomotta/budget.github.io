<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//type of expense
Route::post('/typeExpenses/store','TypeExpenseController@storeTypeExpense')->name('typeexpenses.store');
Route::post('/typeEntries/store','TypeExpenseController@storeTypeEntry')->name('typeentries.store');
Route::put('/typeExpenses/{typeexpense}/update','TypeExpenseController@updateType')->name('typeexpenses.update');
//type of entries
Route::get('/typeExpenses','TypeExpenseController@getTypeExpenses')->name('typeexpenses.get');
Route::get('/typeEntries','TypeExpenseController@getTypeEntries')->name('typeentries.get');
Route::put('/typeEntries/{typeentry}/update','TypeExpenseController@updateType')->name('typeentries.update');

Route::post('/expenses/store','ExpenseController@store')->name('expenses.store');
Route::get('/expenses','ExpenseController@index')->name('expenses.index');
Route::get('/expenses/totalentry','ExpenseController@getTotalEntry')->name('expenses.totalentry');
Route::get('/expenses/totalexpense','ExpenseController@getTotalExpense')->name('expenses.totalexpense');



Route::get('/{any}',function (){
    return view('home');
})->where('any','.*');