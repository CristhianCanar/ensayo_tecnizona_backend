<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = "pedidos";
    protected $primaryKey = "id_pedido";
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
