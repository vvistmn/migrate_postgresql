<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    protected $table = 'attrs';
    protected $primaryKey = 'attr_id';
    protected $guarded = [];

    public $timestamps = false;

    public function attrValues()
    {
        return $this->hasMany(AttrValues::class, 'attr_id', 'attr_id');
    }

    public function attrsParent()
    {
        return $this->hasOne(Attr::class, 'attr_id', 'parent_attr_id');
    }

    public function attrsEtalon()
    {
        return $this->hasOne(Attr::class, 'attr_id', 'etalon_attr_id');
    }
}
