<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{
    //

    protected $fillable = ['compliance_name', 'compliance_description', 'compliance_status'];
}
