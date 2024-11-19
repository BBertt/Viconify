<?php

namespace App\Console\Commands;

use App\Models\MsAuction;
use App\Models\MsUser;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AuctionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auction:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $auctions = MsAuction::where('AuctionProductEndTime', '<=', $now)->get();
        

        if ($auctions->isEmpty()) {
            $this->info('No Auctions to Update.');
            return;
        }

        foreach ($auctions as $auction) {
            $user = MsUser::where('UserID', $auction->AuctionTopBidUserID)->first();

            if ($user->Balance < $auction->AuctionTopBid) {
                $auction->delete();
            }

            else if ($auction->AuctionTopBidUserID != NULL) {
                $user->Balance = $user->Balance - $auction->AuctionTopBid;
                $user->save();

                $transaction = TransactionHeader::create([
                    'UserID' => $auction->AuctionTopBidUserID,
                    'TransactionDate' => now(),
                    'PaymentMethod' => 'Balance',
                ]);

                TransactionDetail::create([
                    'TransactionID' => $transaction->TransactionID,
                    'AuctionID' => $auction->AuctionID,
                    'Quantity' => 1,
                    'Price' => $auction->AuctionTopBid,
                    'TransactionStatus' => 'Pending',
                ]);
            }

            $auction->status = 'Done';
            $auction->save();
            
        }

        $this->info('Auctions Updated Successfully.');
    }
}
