<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public function getImgAttribute($value)
    {
        if ($value) {
            return asset('img/clients/' . $value);
        } else {
            return asset('images/profile/no-image.png');
        }
    }

}
