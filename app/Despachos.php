<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Despachos
 * @package App
 */
class Despachos extends Model {

	public $timestamps=false;
    protected $table='salidas_almacen';
    protected $primaryKey='id_orden';

}
