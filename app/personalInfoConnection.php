<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalInfoConnection extends Model
{
    protected $table = 'tb_personal_info';
    protected $primaryKey = 'pinfo_ID';
    public $timestamps = false;

    //Eto yun inedit ni Paul
    // public function table2(){
    // 	$this->hasMany('App/NameModel', 'fk');
    // }
}
