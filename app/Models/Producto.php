<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = "productos";
    protected $primaryKey = "id_producto";
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
