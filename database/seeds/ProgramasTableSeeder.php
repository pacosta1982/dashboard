<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programas')->insert([
            'name' => "Vy'a Renda",
            'value' => '1',
        ]);

        DB::table('programas')->insert([
            'name' => "Pueblos Originarios",
            'value' => '2',
        ]);

        DB::table('programas')->insert([
            'name' => "Viviendas Economicas",
            'value' => '3',
        ]);

        DB::table('programas')->insert([
            'name' => "Fonavis",
            'value' => '4',
        ]);

        DB::table('programas')->insert([
            'name' => "Sembrando",
            'value' => '5',
        ]);

        DB::table('programas')->insert([
            'name' => "Foncoop",
            'value' => '7',
        ]);

        DB::table('programas')->insert([
            'name' => "Cepra",
            'value' => '8',
        ]);

        DB::table('programas')->insert([
            'name' => "Focem",
            'value' => '9',
        ]);

        DB::table('programas')->insert([
            'name' => "Che Tapyi",
            'value' => '11',
        ]);

        DB::table('programas')->insert([
            'name' => "Convenio Itaipu",
            'value' => '12',
        ]);

        DB::table('programas')->insert([
            'name' => "Yacyreta",
            'value' => '13',
        ]);

        DB::table('programas')->insert([
            'name' => "Convenio Mopc",
            'value' => '14',
        ]);

        DB::table('programas')->insert([
            'name' => "Chacarita Alta",
            'value' => '15',
        ]);

        DB::table('programas')->insert([
            'name' => "Mejoramiento de Viviendas AMA",
            'value' => '16',
        ]);
    }
}
