<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsPost extends Model
{
    use HasFactory;

    protected $primaryKey = 'PostID';

    protected $fillable = [
        'UserID',
        'Title',
        'Description',
        'PostTime',
        'Like',
        'Dislike',
    ];

    public function user()
    {
        return $this->belongsTo(MsUser::class, 'UserID', 'UserID');
    }

    public function pictures()
    {
        return $this->hasMany(MsPicture::class, 'PostID', 'PostID');
    }

    public function comments()
    {
        return $this->hasMany(MsComment::class, 'PostID', 'PostID');
    }
}
