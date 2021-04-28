<?php

namespace App;

use App\AttrValues;
use Illuminate\Database\Eloquent\Model;

class ED extends Model
{
    protected $table = 'e_ds';
    protected $guarded = [];

    public function attrValues()
    {
        return $this->hasMany(AttrValues::class, 'ed_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'ed_id', 'id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'ed_type_id', 'dt_id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'source_id');
    }

    public function dossier()
    {
        return $this->belongsTo(Dossier::class, 'dos_id', 'id');
    }
}
