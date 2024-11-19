<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';

    protected $fillable = [
        'TransactionID',
        'ProductID',
        'AuctionID',
        'Quantity',
        'Price',
        'TransactionStatus'
    ];

    public function product()
    {
        return $this->belongsTo(MsProduct::class, 'ProductID');
    }

    public function transactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class, 'TransactionID');
    }

    public function auction()
    {
        return $this->belongsTo(MsAuction::class, 'AuctionID');
    }
}
