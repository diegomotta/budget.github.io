<?php

use Illuminate\Database\Seeder;

class TypeExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\TypeExpense::class)->create(['type'=>"Alojamiento",'type_amount_id'=>2]);
        factory(App\TypeExpense::class)->create(['type'=>"Actividades",'type_amount_id'=>2]);
        factory(App\TypeExpense::class)->create(['type'=>"Desayuno",'type_amount_id'=>2]);
        factory(App\TypeExpense::class)->create(['type'=>"Salidas",'type_amount_id'=>2]);
        factory(App\TypeExpense::class)->create(['type'=>"Cambio de dinero",'type_amount_id'=>2]);
        factory(App\TypeExpense::class)->create(['type'=>"Almuerzos",'type_amount_id'=>2]);
        factory(App\TypeExpense::class)->create(['type'=>"Comestibles",'type_amount_id'=>2]);
        factory(App\TypeExpense::class)->create(['type'=>"Lavanderia",'type_amount_id'=>2]);

        factory(App\TypeExpense::class)->create(['type'=>"Salario",'type_amount_id'=>1]);
        factory(App\TypeExpense::class)->create(['type'=>"Inversiones",'type_amount_id'=>1]);
        factory(App\TypeExpense::class)->create(['type'=>"Otros",'type_amount_id'=>1]);

    }
}
