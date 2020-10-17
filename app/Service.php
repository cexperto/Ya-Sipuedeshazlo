<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    use Sluggable;    

    protected $fillable = [
        'name','file', 'description', 'iframe', 'cost',
        'status','latbox','longbox','employerId','codUserServices'
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
}
