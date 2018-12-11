<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeExpense extends Model
{
    //
    protected $table = "type_expenses";

    protected $fillable = [
        'id',
        'type',
        'type_amount_id'
    ];

    public function expense()
    {
        return $this->hasOne(Expense::class);
    }

    public function typeAmount(){
        return $this->belongsTo(TypeAmount::class);
    }
}
