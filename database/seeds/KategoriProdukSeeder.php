<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'categories' => 'Ceramic Tile & Granite',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'categories' => 'Paint & Coating',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'categories' => 'Polymer Pipe',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'categories' => 'Light Steel'
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'categories' => 'Alloy Coated Coil Steel',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'categories' => 'Gypsum Board / Panel',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'categories' => 'Closet',
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'categories' => 'Cement Board',
        ]);
        DB::table('categories')->insert([
            'id' => 9,
            'categories' => 'Instant Mortar',
        ]);
        DB::table('categories')->insert([
            'id' => 10,
            'categories' => 'Portland Cement',
        ]);
        DB::table('categories')->insert([
            'id' => 11,
            'categories' => 'Glass Sheet',
        ]);
        DB::table('categories')->insert([
            'id' => 12,
            'categories' => 'Aluminium',
        ]);
    }
}
