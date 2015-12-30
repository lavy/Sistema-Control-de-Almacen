<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario_Seriales extends Model {

    public $timestamps=false;
    protected $primaryKey='id_serial';
    protected $table='inventario_seriales';



    public function Renglon(){
        return $this->belongsToMany('\App\Renglon','seriales','id_serial','serial');
        /*->withPivot('id_renglon','serial');*/
    }
}
