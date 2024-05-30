<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MsProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductName',
        'ProductPrice',
        'ProductDescription',
        'Quantity',
    ];

    public function pictures()
    {
        return $this->hasMany(MsPicture::class, 'ProductID', 'ProductID');
    }
}
