<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certifications extends Model
{
    public function getImgAttribute($value)
    {
        if ($value) {
            return asset('img/cert/' . $value);
        } else {
            return asset('images/profile/no-image.png');
        }
    }}
