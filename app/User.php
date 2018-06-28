<?php

namespace Furbook;

use Furbook\Cat;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    /**
     * @return array
     */
    public function cats()
    {
        return $this->hasMany('Furbook\Cat');
    }

    /**
     * @return array
     */
    public function owns(Cat $cat)
    {
        return $this->id == $cat->id;
    }

    /**
     * @return array
     */
    public function canEdit(Cat $cat)
    {
        return $this->is_admin || $this->owns($cat);
    }

    /**
     * @return array
     */
    public function isAdministrator()
    {
        return $this->getAttribute('is_admin');
    }
}
