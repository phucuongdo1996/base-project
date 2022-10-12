<?php

namespace App\Traits;

trait CommonScope
{
    /**
     * Filter where like: %needed%
     *
     * @param $query
     * @param $data
     * @return mixed
     */
    public function scopeWhereLike($query, $data)
    {
        return $query->where($data[0], 'LIKE', '%' . $data[1] . '%');
    }
}
