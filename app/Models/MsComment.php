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

    public function post()
    {
        return $this->belongsTo(MsPost::class, 'PostID', 'PostID');
    }

    public function parent()
    {
        return $this->belongsTo(MsComment::class, 'CommentParentID', 'CommentID');
    }

    public function children()
    {
        return $this->hasMany(MsComment::class, 'CommentParentID', 'CommentID');
    }
}
