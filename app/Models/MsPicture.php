<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsPicture extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(MsProduct::class, 'ProductID', 'ProductID');
    }
}
