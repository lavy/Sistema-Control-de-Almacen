<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 * @package App
 */
class Almacen extends Model {

    public $timestamps=false;
	protected $table='almacen';
    protected $primaryKey='id_almacen';

}
