<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function transactionDetails() : HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'TransactionID');
    }
}
