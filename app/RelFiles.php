<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelFiles extends Model
{
    protected $table = 'rel_files';
    protected $guarded = [];

    public function fileF1()
    {
        return $this->belongsTo(File::class, 'f1_id', 'id');
    }

    public function relFileF2()
    {
        return $this->hasMany(File::class, 'id', 'f2_id');
    }
}
