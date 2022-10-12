<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasAuthorize
{
    /**
     * Add author when create
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $authorID = self::getAuthorID();
            if ($authorID && $model->hasFillAble('user_id')) {
                $model->created_by = $authorID;
            }
        });
    }

    /**
     * Check isset author column
     *
     * @param $column
     * @return bool
     */
    public function hasFillAble($column): bool
    {
        return in_array($column, $this->fillable);
    }

    /**
     * Get author ID
     *
     * @return null
     */
    public static function getAuthorID()
    {
        return Auth::check() ? Auth::user()->id : null;
    }

    /**
     * Check Authorize
     *
     * @param string $column
     * @return bool
     */
    public function checkAuthorize(string $column = 'user_id'): bool
    {
        return $this->{$column} == Auth::user()->id;
    }
}
