<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'subject','message','sender','codUserContact',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
