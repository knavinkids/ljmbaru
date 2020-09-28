<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minikontak extends Model
{
	protected $table = 'minikontak';
  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $keyType = 'int';
}
