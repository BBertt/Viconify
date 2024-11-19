<?php

namespace App\Services;

use App\Models\MsAuction;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Carbon\Carbon;

class AuctionCommand {

    public function __invoke() {
        $now = Carbon::now();

        $auctions = MsAuction::where('AuctionProductEndTime', '<=', $now)->get();

        if ($auctions->isEmpty()) {
            return;
        }

        foreach ($auctions as $auction) {

            if ($auction->AuctionTopBidUserID != NULL) {
                $transaction = TransactionHeader::create([
                    'UserID' => $auction->AuctionTopBidUserID,
                    'TransactionDate' => now(),
                    'PaymentMethod' => 'Balance',
                ]);

                TransactionDetail::create([
                    'TransactionID' => $transaction->TransactionID,
                    'AuctionID' => $auction,
                    'Quantity' => 1,
                    'Price' => $auction->AuctionTopBid,
                    'TransactionStatus' => 'Pending',
                ]);
            }

            $auction->status = 'Done';
            $auction->save();
            
        }
    }
}