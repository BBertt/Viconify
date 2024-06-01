<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MsCart extends Model
{
    use HasFactory;

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
}
