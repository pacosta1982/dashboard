<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('metas')->insert([
                'name' => "Ninguno",
                'value' => '0',
            ]);
    
            DB::table('metas')->insert([
                'name' => "2011",
                'value' => '7',
            ]);
    
            DB::table('metas')->insert([
                'name' => "2012",
                'value' => '8',
            ]);
    
            DB::table('metas')->insert([
                'name' => "2013",
                'value' => '9',
            ]);
    
            DB::table('metas')->insert([
                'name' => "K 2014",
                'value' => '1',
            ]);
    
            DB::table('metas')->insert([
                'name' => "SN 2014",
                'value' => '2',
            ]);
    
            DB::table('metas')->insert([
                'name' => "2015",
                'value' => '3',
            ]);
    
            DB::table('metas')->insert([
                'name' => "2016",
                'value' => '4',
            ]);
    
            DB::table('metas')->insert([
                'name' => "2019",
                'value' => '10',
            ]);
    
            DB::table('metas')->insert([
                'name' => "2017",
                'value' => '5',
            ]);
    
            
            DB::table('metas')->insert([
                'name' => "2018",
                'value' => '6',
            ]);
    }
}
