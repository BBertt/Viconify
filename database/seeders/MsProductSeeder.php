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
            'ProductID' => 1,
            'UserID' => 1,
            'ProductName' => 'Product 1',
            'ProductPrice' => 100,
            'ProductDescription' => 'Description for Product 1',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'ProductID' => 2,
            'UserID' => 1,
            'ProductName' => 'Product 2',
            'ProductPrice' => 200,
            'ProductDescription' => 'Description for Product 2',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'ProductID' => 3,
            'UserID' => 1,
            'ProductName' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus voluptatum est ducimus, enim nemo provident sapiente tempore aliquid facilis a impedit nostrum, dolorem architecto cupiditate quo tenetur porro! Debitis, tempora.',
            'ProductPrice' => 300,
            'ProductDescription' => 'Description for Product 3',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'ProductID' => 4,
            'UserID' => 1,
            'ProductName' => 'Product 4',
            'ProductPrice' => 400,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'ProductID' => 5,
            'UserID' => 1,
            'ProductName' => 'Product 4',
            'ProductPrice' => 400,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'ProductID' => 6,
            'UserID' => 1,
            'ProductName' => 'Product 4',
            'ProductPrice' => 400,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'ProductID' => 7,
            'UserID' => 1,
            'ProductName' => 'Product 4',
            'ProductPrice' => 400,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'ProductID' => 8,
            'UserID' => 1,
            'ProductName' => 'Product 4',
            'ProductPrice' => 400,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);
    }
}
