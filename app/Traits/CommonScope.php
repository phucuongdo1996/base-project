<?php

namespace App\Traits;

trait CommonScope
{

    /**
     * @param $query
     * @param $data
     * @return mixed
     */
    public function scopeWhereLike($query, $data)
    {
        return $query->where($data[0], 'LIKE', '%' . $data[1] . '%');
    }
}
