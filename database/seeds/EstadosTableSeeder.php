<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'name' => "En Proyecto",
            'value' => 'Y',
        ]);

        DB::table('estados')->insert([
            'name' => "Descartado",
            'value' => 'S',
        ]);

        DB::table('estados')->insert([
            'name' => "A Iniciar",
            'value' => 'I',
        ]);

        DB::table('estados')->insert([
            'name' => "Pendiente",
            'value' => 'D',
        ]);

        DB::table('estados')->insert([
            'name' => "En Ejecución",
            'value' => 'E',
        ]);

        DB::table('estados')->insert([
            'name' => "Culmidado",
            'value' => 'C',
        ]);

        DB::table('estados')->insert([
            'name' => "Paralizado",
            'value' => 'P',
        ]);

        DB::table('estados')->insert([
            'name' => "Rescindido",
            'value' => 'R',
        ]);

        DB::table('estados')->insert([
            'name' => "Advenimiento",
            'value' => 'A',
        ]);
    }
}
