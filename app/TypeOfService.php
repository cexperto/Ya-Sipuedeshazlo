<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfService extends Model
{
    protected $fillable = [
        'id','name','quantity','codServicesType'
    ];
    public function service()
    {
        return $this->belosgsTo(Service::class);        
    }
}
