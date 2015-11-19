<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

    public $timestamps=false;
    protected $primaryKey='id_categoria';
	protected $table='categorias';
  /*  protected $fillable=['',''];
    protected $guarded=[''];*/

    public function subcategorias()
    {
        //Tabla a referenciar Clave foranea del y clave local
        return $this->hasMany('App\Subcategorias','id_categoria','id_categoria');
    }
/*
    public function scopeCategoria($query,$name)
    {
        $query->where('descrip_categoria',$name);
    }*/
}
