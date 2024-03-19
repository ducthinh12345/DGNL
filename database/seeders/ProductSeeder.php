<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'san pham 1',
                'price' => 100000,
            ],
            [
                'name' => 'san pham 2',
                'price' => 888000,
            ],
            [
                'name' => 'san pham 3',
                'price' => 900000,
            ],
            [
                'name' => 'san pham 4',
                'price' => 32000,
            ],
            [
                'name' => 'san pham 5',
                'price' => 88000,
            ],
            [
                'name' => 'san pham 6',
                'price' => 99000,
            ],
            [
                'name' => 'san pham 7',
                'price' => 300000,
            ],
            [
                'name' => 'san pham 8',
                'price' => 320000,
            ],
            [
                'name' => 'san pham 9',
                'price' => 450000,
            ],
            [
                'name' => 'san pham 10',
                'price' => 500000,
            ],
        ];
        DB::table('products')->insert($data);
    }
}
