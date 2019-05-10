<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'jobTitle', 'description','birthday', 'image',
    ];

    public function user(){


        return $this->belongsTo(User::class);
    }
    public function profileImage(){
        if(($this->image))
            $imagepath='/storage/'.($this->image);
        else
            $imagepath ='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png';

        return $imagepath;
    }
}
