<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model {

    public $timestamps=false;
    protected $primaryKey='id_marca';
	protected $table='marca';

    public function modelos()
    {
        //Tabla a referenciar Clave foranea del y clave local
        return $this->hasMany('App\Modelo','id_marca','id_marca');
    }
}
