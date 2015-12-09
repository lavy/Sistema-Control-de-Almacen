<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model {

    public $timestamps=false;
    protected $primaryKey='id_departamento';
    protected $table='departamentos';
	protected $fillable=['descrip_departamento'];
    protected $guarded=['id_departamento'];

    public function Oficinas()
    {
        return $this->belongsTo('App\Oficinas','id_departamento','id_oficina');
    }

  /*  public function scopeDepartamento($query,$name)
    {
        return $query->where('descrip_departamento','LIKE',$name);
    }*/


   /* static function departamento()
    {
        $departamento=\DB::select('select * from departamentos');
        return ($departamento);
    }*/
/*
http://josephrex.me/implementing-dynamic-drop-down-or-dependent-list-in-laravel4/*/



}