<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table = 'transaction_headers';

    protected $primaryKey = 'TransactionID';

    protected $fillable = [
        'UserID',
        'TransactionDate',
        'PaymentMethod'
    ];

    public function transactionDetails() : HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'TransactionID');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(MsUser::class, 'UserID');
    }
}
