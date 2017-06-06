<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitleConnection extends Model
{
    protected $table = "tb_job_title";
    protected $primaryKey = "jobtitle_ID";
    public $timestamps = false;
}
