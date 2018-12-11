<?php

namespace App\Http\Controllers;

use App\TypeExpense;
use Illuminate\Http\Request;

class TypeExpenseController extends Controller
{


    public function getTypeEntries(){
        $expenses = TypeExpense::with('typeAmount')->where('type_amount_id',1)->get();
        return $expenses->toJson();
    }

    public function getTypeExpenses(){
        $expenses = TypeExpense::with('typeAmount')->where('type_amount_id',2)->get();
        return $expenses->toJson();
    }
}
