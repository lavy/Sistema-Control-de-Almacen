<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Renglon
 * @package App
 */
class Renglon extends Model {

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
    protected $primaryKey='id_renglon';

    /**
     * La tabla de base de datos usada por el modelo
     *
     * @var string
     */
    protected $table='renglones';


    /**
     * Relacionamiento de la Tabla Renglon con la tabla Tipo Renglon.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Tipo_Renglon()
    {
        return $this->belongsTo('App\TipoRenglon','id_tipo_renglon','id_renglon');
    }

    public function Serial(){
        return $this->belongsToMany('\App\Seriales','seriales','id_renglon','seriales');
            /*->withPivot('id_renglon','serial');*/
    }
    /*public function (){
        return $this->belongsToMany('\App\Serial','menu_task_user')
            ->withPivot('user_id','status');
    }*/

    public function unidades()
    {
        return $this->belongsTo('\App\Unidades','id_renglon');
    }
}
