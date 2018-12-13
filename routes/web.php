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
Route::post('/typeExpense/store','TypeExpenseController@storeTypeExpense')->name('typeexpenses.store');
Route::post('/typeEntry/store','TypeExpenseController@storeTypeEntry')->name('typeentries.store');
Route::put('/typeExpense/{typeexpense}/update','TypeExpenseController@updateTypeExpense')->name('typeexpenses.update');

Route::get('/typeExpenses','TypeExpenseController@getTypeExpenses')->name('typeexpenses.get');
Route::get('/typeEntries','TypeExpenseController@getTypeEntries')->name('typeentries.get');

Route::post('/expenses/store','ExpenseController@store')->name('expenses.store');

Route::get('/expenses','ExpenseController@index')->name('expenses.index');
Route::get('/expenses/totalentry','ExpenseController@getTotalEntry')->name('expenses.totalentry');
Route::get('/expenses/totalexpense','ExpenseController@getTotalExpense')->name('expenses.totalexpense');



Route::get('/{any}',function (){
    return view('home');
})->where('any','.*');