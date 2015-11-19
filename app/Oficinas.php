<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model {

    public $timestamps=false;
    protected $primaryKey = 'id_oficina';
    protected $table='oficinas';
	protected $fillable=['descrip_oficina'];
    protected $guarded=['id_oficina'];

    public function departamentos()
    {
        //Tabla a referenciar Clave foranea del y clave local
        return $this->hasMany('App\Departamentos','id_oficina','id_oficina');
    }

 /*    static function oficina()
     {
         $oficina = \DB::select('select * from oficinas');
         return ($oficina);
     }*/

    /*public function scopeOficina($query,$buscar)
    {
       $query->where('descrip_oficina',$buscar);
    }*/

}
