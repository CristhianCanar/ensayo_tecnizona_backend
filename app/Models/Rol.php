<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";
    protected $primaryKey = "id_rol";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany(User::class,'users','rol_id','user_id')->withTimestamps();
    }
}
