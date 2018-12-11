<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAmount extends Model
{
    protected $table = "type_amounts";

    protected $fillable = ['id','value'];

    public function expense(){
        return $this->hasOne(Expense::class);
    }

    public function  typeExpense(){
        return $this->hasOne(TypeExpense::class);

    }


}
