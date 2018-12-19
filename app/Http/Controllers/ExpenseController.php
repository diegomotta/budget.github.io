<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //
    public function store(Request $request){
        Expense::create([
                'value' => $request->get('expense'),
                'type_expense_id' => $request->get('type'),
                'type_amount_id'=> $request->get('amount')
        ]);
        return 'ok';
    }


    public function update(Request $request, $id){
        $expense = Expense::with('typeExpense','typeAmount')->where('id',$id)->first();
        $expense->value = $request->get('expense');
        $expense->type_expense_id =   $request->get('type');
        $expense->type_amount_id = $request->get('amount');
        $expense->save();

        return 'ok';
    }

    public function destroy($id){
        $expense = Expense::with('typeExpense','typeAmount')->where('id',$id)->first();
        $expense->delete();
        return 'ok';
    }



    public function index(){
        $expenses = Expense::with('typeExpense','typeAmount')->get();
        return $expenses->toJson();
    }

    public function  getTotalEntry(){
       $totalentry =  Expense::where('type_amount_id', 2)->sum('value');
       return $totalentry;
    }

    public function  getTotalExpense(){
        $totalexpense =  Expense::where('type_amount_id', 1)->sum('value');
        return $totalexpense;
    }
}
