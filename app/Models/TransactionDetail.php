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
    public $incrementing = false;

    protected $primaryKey = ['TransactionID', 'ProductID'];

    protected $fillable = [
        'TransactionID',
        'ProductID',
        'Quantity',
        'Price',
        'TransactionStatus'
    ];



    public function product() : BelongsTo
    {
        return $this->belongsTo(MsProduct::class, 'ProductID');
    }

    public function transactionHeader() : BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, 'TransactionID');
    }
}
