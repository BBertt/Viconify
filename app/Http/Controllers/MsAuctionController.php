<?php

namespace App\Http\Controllers;

use App\Models\MsAuction;
use App\Models\MsUser;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class MsAuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auctions = MsAuction::with('pictures', 'user')->latest()->paginate(5);
        return view('shop.auction-index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($AuctionID)
    {
        $auction = MsAuction::with('pictures', 'user')->where('AuctionID', $AuctionID)->first();
        
        return view('shop.auction-show', compact('auction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MsAuction $msAuction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $AuctionID)
    {
        $bid = $request->input('bid');
        
        $auction = MsAuction::where('AuctionID', $AuctionID)->first();
        $user = MsUser::where('UserID', auth()->id())->first();
        if ($bid <= $auction->AuctionTopBid || $bid < $auction->AuctionProductStartPrice) {
            return redirect()->back()
            ->withInput()
            ->withErrors(['bid' => 'Bid must be higher than current bid!',
                            'startPrice' => 'Bid must start at Start Price!']);
        }
        else if ($bid > $user->Balance) {
            return redirect()->back()
            ->withInput()
            ->withErrors(['balance' => 'You do not have sufficient balance.']);
        }
        
        if ($bid >= $auction->AuctionProductEndPrice) {
            $auction->AuctionTopBid = $bid;
            $auction->AuctionTopBidUserID = $user->UserID;
            
            $transaction = TransactionHeader::create([
                'UserID' => $user->UserID,
                'TransactionDate' => now(),
                'PaymentMethod' => 'Balance',
            ]);
            TransactionDetail::create([
                'TransactionID' => $transaction->TransactionID,
                'AuctionID' => $auction->AuctionID,
                'Quantity' => 1,
                'Price' => $bid,
                'TransactionStatus' => 'Pending',
            ]);

            $auction->Status = 'Done';
            $auction->save();

            $user->Balance = $user->Balance - $bid;
            $user->save();

            return redirect()->route('transaction');
        }

        $auction->AuctionTopBid = $bid;
        $auction->AuctionTopBidUserID = $user->UserID;
        $auction->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsAuction $msAuction)
    {
        //
    }
}
