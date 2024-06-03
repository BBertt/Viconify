<?php

namespace Database\Seeders;

use App\Models\MsProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 1',
            'ProductPrice' => 100,
            'ProductDescription' => 'Description for Product 1',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 2',
            'ProductPrice' => 200,
            'ProductDescription' => 'Description for Product 2',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 3',
            'ProductPrice' => 300,
            'ProductDescription' => 'Description for Product 3',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 4',
            'ProductPrice' => 400,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);
    }
}
