<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MsCart extends Model
{
    use HasFactory;

    protected $table = 'ms_carts';
    protected $primaryKey = 'CartID';

    protected $fillable = [
        'UserID',
        'ProductID',
        'Quantity'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(MsProduct::class, 'ProductID');
    }

    public function transactionDetail() : BelongsTo
    {
        return $this->belongsTo(TransactionDetail::class, 'CartID');
    }
}
