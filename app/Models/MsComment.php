<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'PostID',
        'VideoID',
        'ForumID',
        'CommentParentID',
        'UserID',
        'Comments',
        'Like',
        'Dislike',
    ];

    public function user()
    {
        return $this->belongsTo(MsUser::class, 'UserID', 'UserID');
    }

    public function video()
    {
        return $this->belongsTo(MsVideo::class, 'VideoID', 'VideoID');
    }
}
