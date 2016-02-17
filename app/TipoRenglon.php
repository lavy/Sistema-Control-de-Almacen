<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoRenglon
 * @package App
 */
class TipoRenglon extends Model {


    /**
     * El Timestamp de la tabla
     * valores: 'true','false'.
     *
     * @var bool
     */
	public $timestamps=false;

    /**
     * La llave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey='id_tipo_renglon';

    /**
     * La tabla de base de datos usada por el modelo.
     *
     * @var string
     */
    protected $table='tipo_renglones';


    /**
     * Relacionamiento de la tabla con Renglones(Tipo Articulo).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Renglon()
    {
        return $this->hasMany('App\Renglon','id_tipo_renglon','id_tipo_renglon');
    }
}
