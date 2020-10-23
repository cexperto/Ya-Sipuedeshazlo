<?php

namespace App;
use App\Service;
use Illuminate\Database\Eloquent\Model;

class ValorationServices extends Model
{
    protected $fillable = [
        'valoration','comments','codServiceValoration',
    ];
    public function service()
    {
        return $this->belosgsTo(Service::class);        
    }
}
