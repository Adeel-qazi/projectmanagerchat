<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','manager_id','name','image_path','video_path','voice_note','content'];

    public function manager(){
        return $this->belongsTo(Manager::class);
    }


}
