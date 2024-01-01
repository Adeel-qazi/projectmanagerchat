<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name','type','start','close','image'];


    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }


    public function messages(){
        return $this->hasMany(Message::class, 'project_id','id');
    }




}
