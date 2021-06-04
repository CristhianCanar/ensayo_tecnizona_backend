<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuloRol extends Model
{
    use HasFactory;

    protected $table = "modulos_roles";
    protected $guarded = [];
    protected $primaryKey = "id_modulo_rol";
    protected $dates = ['deleted_at'];


    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id','id_rol');
    }

    public function modulo(){
        return $this->belongsTo(Modulo::class,'modulo_id','id_modulo');
    }
}
