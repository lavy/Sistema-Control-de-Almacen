<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model {

	public $timestamps=false;
    protected $primaryKey='id_articulo';
    protected $table='articulos';

    public function serialimei()
    {
        return $this->belongsToMany('App\SerialImeis');
    }

}
