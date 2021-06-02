<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    protected $table = "roles_users";
    protected $primaryKey = "id_rol_user";
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class, 'id_user', 'user_id');
    }

    public function roles(){
        return $this->belongsTo(Rol::class, 'id_rol', 'rol_id');
    }
    /* Estudiar como funciona
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    */
}
