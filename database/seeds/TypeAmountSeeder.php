<?php

use Illuminate\Database\Seeder;

class TypeAmountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\TypeAmount::class)->create(['value'=>"Ingreso"]);

        factory(App\TypeAmount::class)->create(['value'=>"Egreso"]);

    }
}
