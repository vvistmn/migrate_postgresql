<?php

namespace App;

use App\ED;
use App\Dossier;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'sources';
    protected $guarded = [];

    public function eds()
    {
        return $this->hasMany(ED::class, 'source_id', 'source_id');
    }

    public function dossiers()
    {
        return $this->hasMany(Dossier::class, 'source_id', 'source_id');
    }
}
