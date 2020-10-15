<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'name','file', 'description', 'iframe', 'cost','status','latbox','longbox','codUserServices'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
