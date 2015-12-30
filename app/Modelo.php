<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model {

    public $timestamps=false;
    protected $table='modelo';
    protected $primaryKey='id_modelo';


    public function marcas()
    {
        return $this->belongsTo('App\Marca','id_modelo','id_marca');
    }

}
