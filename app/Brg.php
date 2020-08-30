<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brg extends Model
{
    protected $guarded = ['id'];

    protected $table = 'brg'; 
    public static function rules($update = false, $id = null)
    {
        $rules = [
            'kode'    => 'required'            
        ];

        if ($update) {
            return $rules;
        }

        return array_merge($rules, [
            'kode'         => 'required|unique:brg,kode',
        ]);
    }
}
