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
            'ProductName' => 'UNIQLO Kemeja Pria Lengan Panjang Casual Slimfit',
            'ProductPrice' => 175000,
            'ProductDescription' => 'Detail produk dari Kemeja lengan panjang pria terbaru
            Merk UNIQLO
            • Kerah kemeja
            • Ready Stok
            • Material Katun Twill Premium
            • Gender Pria Dan Wanita
            • Model Slimfit / reguler fit',
            'Quantity' => 25,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'SAMONO Pemeras Jeruk Elektrik Praktis Kapasitas 1 Liter SW-JCS300',
            'ProductPrice' => 190000,
            'ProductDescription' => 'Samono Pemeras Jeruk Elektrik
            Memeras Jeruk dengan lebih praktis tanpa memerlukan tenaga dan harus mengotori tangan. Hasil lebih banyak dan langsung dapat dijadikan teko jus jeruk.

            Tipe : SW-JCS300
            Warna : Hitam
            Daya : 30 Watt
            Kapasitas : 1 Liter
            Bahan : BPA Free
            ',
            'Quantity' => 34,
        ]);

        MsProduct::create([
            'ProductID' => 3,
            'UserID' => 2,
            'ProductName' => 'Official Xiaomi GTV A 32" - GTVA32',
            'ProductPrice' => 1900000,
            'ProductDescription' => 'Hiburan Favorit Anda:
            Beralih antara aplikasi dengan mudah dengan Google TV, menyatukan film, acara TV, dan lainnya dari semua langganan Anda dalam satu tempat. Dapatkan rekomendasi, gunakan pencarian Google yang andal untuk menemukan konten di lebih dari 10.000 aplikasi, atau jelajahi ratusan saluran gratis dengan profil yang dipersonalisasi.

            Kontrol TV dengan Suara Anda:
            TV Anda lebih membantu dari sebelumnya. Perintahkan Google Assistant untuk mencari film, melakukan streaming aplikasi, memutar musik, mengontrol TV - semuanya lewat suara Anda. Tekan tombol Google Assistant di remote untuk memulai.',
            'Quantity' => 2,
        ]);

        MsProduct::create([
            'ProductID' => 4,
            'UserID' => 2,
            'ProductName' => 'Buku Cerita Disney Winnie the Pooh & Pinokio Bhs Indonesia - Original - Winnie the Pooh',
            'ProductPrice' => 65000,
            'ProductDescription' => '4 pages (kertas tebal glossy) - Hard Cover - 20 x 20 cm ketebalan 1 cm - Language: Bahasa Indonesia - Published by GinukGinukBooks Indonesia - Estimasi berat: 400 grams',
            'Quantity' => 200,
        ]);

        MsProduct::create([
            'ProductID' => 5,
            'UserID' => 2,
            'ProductName' => 'A Little Life',
            'ProductPrice' => 65000,
            'ProductDescription' => 'Name : A Little Life
            Binding : Paperback
            Publication Date : 2016-01-26
            Author : Yanagihara, Hanya
            Publisher : Anchor Books
            ISBN-13 : 9780804172707
            Language : English
            Pages : 832

            NATIONAL BESTSELLER - A stunning "portrait of the enduring grace of friendship" (NPR) about the families we are born into, and those that we make for ourselves. A masterful depiction of love in the twenty-first century.

            A NATIONAL BOOK AWARD FINALIST - A MAN BOOKER PRIZE FINALIST - WINNER OF THE KIRKUS PRIZE',
            'Quantity' => 25,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 5',
            'ProductPrice' => 500,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 6',
            'ProductPrice' => 600,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 7',
            'ProductPrice' => 700,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);

        MsProduct::create([
            'UserID' => 1,
            'ProductName' => 'Product 8',
            'ProductPrice' => 800,
            'ProductDescription' => 'Description for Product 4',
            'Quantity' => 10,
        ]);
    }
}
