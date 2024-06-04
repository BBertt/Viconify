<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsVideo extends Model
{
    use HasFactory;

    protected $primaryKey = 'VideoID';

    protected $fillable = [
        'UserID',
        'VideoImage',
        'VideoLinkEmbedded',
        'Title',
        'Description',
        'PostTime',
        'Views',
        'Like',
        'Dislike',
        'VideoType'
    ];

    public function user()
    {
        return $this->belongsTo(MsUser::class, 'UserID', 'UserID');
    }

    public function comments()
    {
        return $this->hasMany(MsComment::class, 'VideoID', 'VideoID');
    }
}
