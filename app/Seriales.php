<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Seriales extends Model {

	public $timestamps=false;
    protected $primaryKey='id_serial';
    protected $table='seriales';

    public function Renglon(){
        return $this->belongsToMany('\App\Renglon','seriales','id_serial','seriales');
            /*->withPivot('id_renglon','serial');*/
    }
}
