<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa a un cliente en el sistema.
 * * @property int $id
 * @property string $nombre
 */
class Clientes extends Model
{
    /**
     * Obtiene todas las facturas asociadas a este cliente (Relación Uno a Muchos).
     * * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas(){
        return $this->hasMany('App\Models\facturas', 'cliente_id');
    }
}
