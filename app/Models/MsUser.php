<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class MsUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'ms_users';
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'ProfileImage',
        'Name',
        'password',
        'email',
        'Address',
        'Role',
        'Balance',
        'LockedBalance',
        'PhoneNumber',
        'Gender',
        'StoreDescription',
        'StoreName',
        'StoreBanner',
        'StoreStatus',
        'StoreRating',
        'StoreStartTime',
        'StoreEndTime',
        'StoreDeliveryTime',
    ];

    protected $hidden = [
        'password','remember_token',
    ];

    /**
     * Get the videos for the user.
     */
    public function videos()
    {
        return $this->hasMany(MsVideo::class, 'UserID');
    }

    /**
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany(MsPost::class, 'UserID');
    }

    /**
     * Get the forums for the user.
     */
    public function forums()
    {
        return $this->hasMany(MsForum::class, 'UserID');
    }

    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(MsComment::class, 'UserID');
    }

    /**
     * Get the products for the user.
     */
    public function products()
    {
        return $this->hasMany(MsProduct::class, 'UserID');
    }

    /**
     * Get the auctions for the user.
     */
    public function auctions()
    {
        return $this->hasMany(MsAuction::class, 'UserID');
    }

    /**
     * Get the transaction headers for the user.
     */
    public function transactions()
    {
        return $this->hasMany(TransactionHeader::class, 'UserID');
    }

    /**
     * Get the reviews for the user.
     */
    public function reviews()
    {
        return $this->hasMany(MsReview::class, 'UserID');
    }

    /**
     * Get the carts for the user.
     */
    public function carts()
    {
        return $this->hasMany(MsCart::class, 'UserID');
    }

    /**
     * Get the friends for the user.
     */
    public function friends()
    {
        return $this->hasMany(MsFriend::class, 'UserID');
    }

    /**
     * Get the messages sent by the user.
     */
    public function messages()
    {
        return $this->hasMany(MsMessage::class, 'SenderID');
    }
}
