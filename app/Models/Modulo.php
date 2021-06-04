<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Modulo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "modulos";
    protected $primaryKey = "id_modulo";
    protected $guarded = ["hijos"];
    protected $dates = ['deleted_at'];



    public static function get_menu($padre = null, $user_id){

        $resultado = [];

        $datos = DB::table('users')->distinct()
        ->select('modulos.*')
        ->join('roles','roles.id_rol','=','roles_users.rol_id')
        ->join('modulos_roles','modulos_roles.rol_id','=','roles.id_rol')
        ->join('modulos','modulos.id_modulo','=', 'modulos_roles.id_modulo')
        ->where('modulos.id_modulo_padre',$padre)
        ->where('users.id_user',$user_id)
        ->orderBy('id_modulo','asc')
        ->get();

        $i=0;
        foreach($datos as $d){
            $resultado[$i] = $d;

            if($d->url_modulo =='#'){
                $resultado[$i]->hijos = Modulo::get_menu($d->id_modulo, $user_id);
            }
            $i++;
        }

        return $resultado;
    }

}
