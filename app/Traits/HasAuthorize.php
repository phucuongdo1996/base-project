<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CheckAuthorize
{

    /**
     * @param string $column
     * @return bool
     */
    public function checkAuthorize(string $column = 'user_id'): bool
    {
        return $this->{$column} == Auth::user()->id;
    }
}
