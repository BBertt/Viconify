<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MsPicture extends Model
{
    use HasFactory;

    protected $primaryKey = 'PictureID';

    protected $fillable = [
        'PostID',
        'ProductID',
        'AuctionID',
        'PictureData',
    ];

    public function post()
    {
        return $this->belongsTo(MsPost::class, 'PostID', 'PostID');
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(MsProduct::class, 'ProductID', 'ProductID');
    }
}
