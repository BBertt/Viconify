<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MsProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProductID';

    public function getRouteKeyName()
    {
        return 'ProductID';
    }

    protected $fillable = [
        'UserID',
        'ProductName',
        'ProductPrice',
        'ProductDescription',
        'Quantity',
    ];

    public function pictures() : HasMany
    {
        return $this->hasMany(MsPicture::class, 'ProductID', 'ProductID');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(MsUser::class, 'UserID');
    }

    public function carts() : HasMany
    {
        return $this->hasMany(MsCart::class, 'ProductID');
    }

    public function transactionDetails() : HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'ProductID');
    }
}
