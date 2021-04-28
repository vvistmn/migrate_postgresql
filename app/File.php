<?php

namespace App;

use App\FileRole;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $guarded = [];

    public function relFileF1()
    {
        return $this->hasMany(RelFiles::class, 'f1_id', 'id');
    }

    public function relFileF2()
    {
        return $this->hasMany(RelFiles::class, 'f2_id', 'id');
    }

    public function ed()
    {
        return $this->belongsTo(ED::class, 'ed_id', 'id');
    }

    public function fileRole()
    {
        return $this->belongsTo(FileRole::class, 'fr_id', 'fr_id');
    }

    public function fileExtension()
    {
        return $this->belongsTo(FileExtension::class, 'fe_id', 'fe_id');
    }
}
