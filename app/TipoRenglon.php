<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoRenglon
 * @package App
 */
class TipoRenglon extends Model {

	public $timestamps=false;
    protected $primaryKey='id_tipo_renglon';
    protected $table='tipo_renglones';

    public function Renglon()
    {
        return $this->hasMany('App\Renglon','id_tipo_renglon','id_tipo_renglon');
    }
}
