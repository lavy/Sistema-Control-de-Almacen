<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Renglon extends Model {

    public $timestamps=false;
    protected $primaryKey='id_renglon';
    protected $table='renglones';

    public function Tipo_Renglon()
    {
        return $this->belongsTo('App\TipoRenglon','id_tipo_renglon','id_renglon');
    }

    public function Serial(){
        return $this->belongsToMany('\App\Seriales','seriales','id_renglon','seriales');
            /*->withPivot('id_renglon','serial');*/
    }
    /*public function (){
        return $this->belongsToMany('\App\Serial','menu_task_user')
            ->withPivot('user_id','status');
    }*/

    public function unidades()
    {
        return $this->belongsTo('\App\Unidades','id_renglon');
    }
}
