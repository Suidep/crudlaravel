<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa una factura emitida.
 */
class facturas extends Model
{
    /**
     * Obtiene el cliente al que pertenece la factura (Relación Inversa).
     * * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente(){
        return $this->belongsTo('App\Models\clientes', 'cliente_id');
    }

    public function facturalineas(){
        return $this->hasMany('App\Models\facturalineas', 'id_factura');
    }
}
