<?php

use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wisatas')->insert([
            'nama_wisata' => "Air Terjun Timponan 1",
            'lokasi' => "lingsar",
            'jenis_wisata' =>"wisata alam" ]);
         
    }
}
