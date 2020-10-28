<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    protected $fillable = [
        'id','name','description','domain', 'expirience',
        'codUserSkills'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
