<?php

namespace App\Http\Controllers;

use App\TypeExpense;
use Illuminate\Http\Request;

class TypeExpenseController extends Controller
{

    public function storeTypeExpense(Request $request){
        $typeexpense =TypeExpense::create([
            'type' => $request->get('type'),
            'type_amount_id'=> 2
        ]);
        return $typeexpense;
    }

    public function storeTypeEntry(Request $request){
        $typeentry =TypeExpense::create([
            'type' => $request->get('type'),
            'type_amount_id'=> 1
        ]);
        return $typeentry;
    }


    public function updateTypeExpense(Request $request, $id){
        $typeExpense = TypeExpense::where('id',$id)->first();
        $typeExpense->type = $request->get('type');
        $typeExpense->save();
        return $typeExpense;
    }


    public function getTypeEntries(){
        $expenses = TypeExpense::with('typeAmount')->where('type_amount_id',1)->get();
        return $expenses->toJson();
    }

    public function getTypeExpenses(){
        $expenses = TypeExpense::with('typeAmount')->where('type_amount_id',2)->orderBy('created_at','desc')->get();
        return $expenses->toJson();
    }
}
