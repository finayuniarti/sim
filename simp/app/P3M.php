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
}
