<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidades
 * @package App
 */
class Unidades extends Model {

	protected $table='unidades_medidas';
    protected $primaryKey='id_unidad';

    public function renglon()
    {
        return $this->hasMany('\App\Renglon','id_unidad','id_unidad');
    }
}
