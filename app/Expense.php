<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //

    protected $table = "expenses";

    protected $fillable = ['value','id','type_expense_id','type_amount_id'];


    public function typeExpense(){
        return $this->belongsTo(TypeExpense::class,'type_expense_id');
    }

    public function typeAmount(){
        return $this->belongsTo(TypeAmount::class,'type_amount_id');
    }
}
