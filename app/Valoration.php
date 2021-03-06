<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoration extends Model
{
    protected $fillable = [
        'valoration','comments','evaluator','codeUserValoration',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
