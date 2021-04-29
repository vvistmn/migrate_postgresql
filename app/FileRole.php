<?php

namespace App;

use App\File;
use Illuminate\Database\Eloquent\Model;

class FileRole extends Model
{
    protected $table = 'file_roles';
    protected $primaryKey = 'fr_id';
    public $timestamps = false;
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany(File::class, 'fr_id', 'fr_id');
    }
}
