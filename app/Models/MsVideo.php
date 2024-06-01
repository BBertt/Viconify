<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsVideo extends Model
{
    use HasFactory;

    protected $primaryKey = 'VideoID';
    protected $guarded = ['VideoID'];

    public function user() {
        return $this->belongsTo(MsUser::class, 'UserID');
    }
}
