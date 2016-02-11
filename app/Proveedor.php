<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * @package App
 */
class Proveedor extends Model {

    public $timestamps=false;
	protected $table='proveedores';
    protected $primaryKey='id_proveedor';
    /*protected $fillable=[''];
    protected $guarded='id_proveedor';*/


}
