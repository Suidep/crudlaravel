<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facturalineas extends Model
{
    //
    public function factura(){
        return $this->belongsTo('App\Models\facturas', 'id_factura');
    }
}
