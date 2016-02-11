<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tecnico
 * @package App
 */
class Tecnico extends Model {

	public $timestamps=false;
    protected $primaryKey='id_tecnico';
    protected $table='tecnicos';
    protected $fillable=[];
    protected $guarded=[];


}
