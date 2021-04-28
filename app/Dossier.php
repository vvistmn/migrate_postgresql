<?php

namespace App;

use App\ED;
use App\Source;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $table = 'dossiers';
    protected $guarded = [];

    public function eds()
    {
        return $this->hasMany(ED::class, 'dos_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'source_id');
    }
}
