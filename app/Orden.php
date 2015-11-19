<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model {

	public $timestamps=false;
    protected $primaryKey='id_orden';
    protected $table='planilla_orden';

    static function planilla(/*$id,$user*/)
    {

        return DB::select("select d.cantidad,d.id_orden from detalle_planilla_orden d inner join
                            planilla_orden p on d.id_orden = p.id_orden");


    }

    static function user_solicitante()
    {
        return DB::select("
          SELECT u.ci_usua, u.nombre, u.apellido FROM users u INNER JOIN planilla_orden p ON u.cod_usua = p.cod_usua
          WHERE u.cod_usua =" .Auth::check());
    }

}
