<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsMessage extends Model
{
    use HasFactory;

    protected $table = 'ms_messages';
    protected $primaryKey = 'MessageID';

    protected $fillable = [
        'ReceiverID',
        'SenderID',
        'message',
        'Status',
    ];

    public function sender()
    {
        return $this->belongsTo(MsUser::class, 'SenderID', 'UserID');
    }

    public function reciever()
    {
        return $this->belongsTo(MsUser::class, 'RecieverID', 'UserID');
    }
}
