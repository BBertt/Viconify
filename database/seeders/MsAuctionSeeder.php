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
            'AuctionProductName' => '[Preloved] Monitor LG Flatron W1953SE',
            'AuctionProductStartPrice' => 150000,
            'AuctionProductEndPrice' => 1000000,
            'AuctionProductDescription' => 'Monitor LG Flatron W1953SE (masih menyala dengan baik)
- Pembelian Maret 2011
- Layar 19 inci
- Resolusi 1366x768 pixels
- Tipe LCD: TN Panel
- Kondisi fisik minim baret
- No dead pixel

Kelengkapan: Unit monitor, kabel power, kabel VGA, bonus adapter VGA-HDMI merek Orico

Dus sudah tidak ada, akan dikirim menggunakan plastic wrap, styrofoam, dan bubblewrap. Silakan chat jika ada yang kurang jelas.',
            'AuctionProductEndTime' => now()->addDay(),
            'Status' => 'Pending',
        ]);

        MsPicture::create([
            'AuctionID' => $auction->AuctionID,
            'PictureData' => 'product_images/product_11_1.png'
        ]);

        $auction = MsAuction::create([
            'UserID' => 2,
            'AuctionProductName' => 'Stary Night Painting',
            'AuctionProductStartPrice' => 2000000,
            'AuctionProductEndPrice' => 10000000,
            'AuctionProductDescription' => 'Painting of The Stary Night. Huge Size.',
            'AuctionProductEndTime' => now()->addDay(),
            'Status' => 'Pending',
        ]);

        MsPicture::create([
            'AuctionID' => $auction->AuctionID,
            'PictureData' => 'product_images/product_12_1.png'
        ]);

        MsPicture::create([
            'AuctionID' => $auction->AuctionID,
            'PictureData' => 'product_images/product_12_2.png'
        ]);
    }
}
