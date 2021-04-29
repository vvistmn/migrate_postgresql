<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table = 'document_types';
    protected $primaryKey = 'dt_id';
    protected $guarded = [];
    
    public $timestamps = false;

    public function eds()
    {
        return $this->hasMany(ED::class, 'ed_type_id', 'dt_id');
    }
}
