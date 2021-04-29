<?php

namespace App;

use App\File;
use Illuminate\Database\Eloquent\Model;

class FileExtension extends Model
{
    protected $table = 'file_extensions';
    protected $primaryKey = 'fe_id';
    public $timestamps = false;
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(File::class, 'fe_id', 'fe_id');
    }
}
