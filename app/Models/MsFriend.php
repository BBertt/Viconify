<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsFriend extends Model
{
    use HasFactory;

    protected $table = 'ms_friends';
    protected $primaryKey = 'FriendListID';

    protected $fillable = [
        'UserID',
        'FriendID',
        'Status',
    ];

    public function user()
    {
        return $this->belongsTo(MsUser::class, 'UserID', 'UserID');
    }

    public function friend()
    {
        return $this->belongsTo(MsUser::class, 'FriendID', 'UserID');
    }
}
