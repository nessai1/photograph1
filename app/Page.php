<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function scopeByAlias($query, $alias)
    {
        return $query->where('alias', $alias)->first();
    }
}
