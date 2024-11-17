<?php

namespace Database\Seeders;

use App\Models\MsAuction;
use App\Models\MsPicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsAuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $auction = MsAuction::create([
            'UserID' => 1,
            'AuctionProductName' => 'UNIQLO Kemeja Pria Lengan Panjang Casual Slimfit',
            'AuctionProductStartPrice' => 25000,
            'AuctionProductEndPrice' => 175000,
            'AuctionProductDescription' => 'Detail produk dari Kemeja lengan panjang pria terbaru
            Merk UNIQLO
            • Kerah kemeja
            • Ready Stok
            • Material Katun Twill Premium
            • Gender Pria Dan Wanita
            • Model Slimfit / reguler fit',
            'AuctionProductEndTime' => now()->addDay(),
        ]);

        MsPicture::create([
            'AuctionID' => $auction->AuctionID,
            'PictureData' => 'product_images/product_1_1.png'
        ]);
    }
}
