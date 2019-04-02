<?php

use Illuminate\Database\Seeder;

class TerrenosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terrenos')->insert([
            'name' => "Compra de Terreno",
            'value' => 'A',
        ]);

        DB::table('terrenos')->insert([
            'name' => "Lote Propio",
            'value' => 'P',
        ]);

        DB::table('terrenos')->insert([
            'name' => "Municipal",
            'value' => 'M',
        ]);

        DB::table('terrenos')->insert([
            'name' => "Indert",
            'value' => 'I',
        ]);

        DB::table('terrenos')->insert([
            'name' => "Comunitario",
            'value' => 'C',
        ]);

        DB::table('terrenos')->insert([
            'name' => "Senavitat",
            'value' => 'SNV',
        ]);

        DB::table('terrenos')->insert([
            'name' => "Gobernación",
            'value' => 'G',
        ]);

        DB::table('terrenos')->insert([
            'name' => "SAS (Lote Propio)",
            'value' => 'S',
        ]);

        DB::table('terrenos')->insert([
            'name' => "SAS (Sin Autorización)",
            'value' => 'SSA',
        ]);

        DB::table('terrenos')->insert([
            'name' => "Falta Información",
            'value' => 'F',
        ]);
    }
}
