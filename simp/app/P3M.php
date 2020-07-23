<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P3M extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'id_user', 'id');
    }

    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'id_p3m', 'id');
    }

    /**
     * Retrieve the child model for a bound value.
     *
     * @param string $childType
     * @param mixed $value
     * @param string|null $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveChildRouteBinding($childType, $value, $field)
    {
        // TODO: Implement resolveChildRouteBinding() method.
    }
}
