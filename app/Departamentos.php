<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamentos
 * @package App
 */
class Departamentos extends Model {

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
    protected $primaryKey='id_departamento';

    /**
     * La tabla de base de datos usada por el modelo
     *
     * @var string
     */
    protected $table='departamentos';


	/*protected $fillable=['descrip_departamento'];
    protected $guarded=['id_departamento'];*/


    /**
     * Relacionamiento de la Tabla Departamento con la Tabla Oficinas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Oficinas()
    {
        return $this->belongsTo('App\Oficinas','id_departamento','id_oficina');
    }


}
