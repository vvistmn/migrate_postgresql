<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttrValues extends Model
{
    protected $table = 'attr_values';
    protected $guarded = [];

    public function attr()
    {
        return $this->belongsTo(Attr::class, 'attr_id', 'attr_id');
    }

    public function ed()
    {
        return $this->belongsTo(ED::class, 'ed_id', 'id');
    }
}
