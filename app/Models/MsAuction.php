<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsAuction extends Model
{
    use HasFactory;

    protected $primaryKey = 'AuctionID'; // Specify the primary key
    public $incrementing = true;         // Ensure it auto-increments
    protected $keyType = 'int';          // Specify the key type

    protected $fillable = [
        'UserID',
        'AuctionProductName',
        'AuctionProductStartPrice',
        'AuctionProductEndPrice',
        'AuctionProductDescription',
        'AuctionProductEndTime',
    ];

    public function pictures()
    {
        return $this->hasMany(MsPicture::class, 'AuctionID', 'AuctionID');
    }

    public function user()
    {
        return $this->belongsTo(MsUser::class, 'UserID', 'UserID');
    }
}
