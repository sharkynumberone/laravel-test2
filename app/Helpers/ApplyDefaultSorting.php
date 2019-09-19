<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait ApplyDefaultSorting
 *
 * @package App\Helpers
 */
trait ApplyDefaultSorting
{
    /**
     * Apply default sorting params to query builder
     *
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public static function applyDefaultSorting(Builder $query, array $params): Builder
    {
        $query->when($params['sort_by'] ?? null, function ($query, $sort_by) use ($params) {
            $query->orderBy($sort_by, $params['sort_direction']);
        });

        return $query;
    }

}
