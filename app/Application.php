<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'userId', 'codServices',
    ];
    public function services(){
        return $this->belongsTo(Service::class);
    }
}
