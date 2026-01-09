<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;

class Role extends Model
{
    // Allow mass assignment for the 'name' column
    protected $fillable = ['name'];

    // Relationships

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
{
    return $this->belongsToMany(Permission::class);
}

}
