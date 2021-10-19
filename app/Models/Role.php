<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'show_users',
        'modify_roles',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'show_users' => false,
        'modify_roles' => false,
    ];

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function users() {
        return $this->belongsToMany(User::class)->using(RoleUser::class);
    }
}
