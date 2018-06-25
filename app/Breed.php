<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    /**
     * @return array
     */
    public function cats()
    {
        return $this->hasMany('Furbook\Cat');
    }
}
