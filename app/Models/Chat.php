<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    // public function sender()
    // {
    //     return $this->belongsTo(Manager::class, 'sender_id', 'id');
    // }

    // public function receiver()
    // {
    //     return $this->belongsTo(Manager::class, 'receiver_id', 'id');
    // }

    // public function messages(){
    //     return $this->hasMany(Message::class, 'chat_id','id');
    // }
}
