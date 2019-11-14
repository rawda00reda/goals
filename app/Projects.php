<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function getImgAttribute($value)
    {
        if ($value) {
            return asset('img/projects/' . $value);
        } else {
            return asset('images/profile/no-image.png');
        }
    }
}
