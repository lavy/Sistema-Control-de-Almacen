<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLevel
 * @package App
 */
class UserLevel extends Model {

	public $timestamps=false;
    protected $table='userlevels';
    protected $primaryKey='UserLevelID';


}
