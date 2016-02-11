<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jefes
 * @package App
 */
class Jefes extends Model {

	public $timestamps=false;
    protected $primaryKey='id_jefe';
    protected $table='jefes';

}
