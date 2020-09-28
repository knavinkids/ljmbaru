<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class piutang extends Model
{
   protected $table = 'piutanglite'; 
   protected $primaryKey = 'n';
   public $incrementing = false;
   protected $keyType = 'string';
}
