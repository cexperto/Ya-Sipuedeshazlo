<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    use Sluggable;    

    protected $fillable = [
        'names','file', 'description', 'iframe', 'cost',
        'state','latbox','longbox','employerId','codUserServices'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source'    => 'description',
                'onpudate'  => true
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getGetImageAttribute(){
        if($this->image)
            return url("storage/$this->image");
    }
    
    public function valorationServices()
    {
        return $this->hasOne(ValorationServices::class);
    }
    public function typeServices()
    {
        return $this->hasOne(TypeOfService::class);
    }
    public function applications(){
        return $this->hasMany(Application::class);
    }
}
