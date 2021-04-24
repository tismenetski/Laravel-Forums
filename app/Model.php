<?php


namespace App;
use Illuminate\Database\Eloquent\Model as BaseModel;

// This class disables mass assignment
class Model extends BaseModel
{

    protected $guarded = [];
}
