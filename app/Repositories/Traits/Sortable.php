<?php

namespace App\Repositories\Traits;

/**
 * Trait Sortable
 * @package App\Repositories\Traits
 */
trait Sortable
{
    public $sortBy = 'created_at';

    public $sortOrder = 'asc';

    /**
     * @param string $sortBy
     */
    public function setSortBy($sortBy = 'created_at')
    {
        $this->sortBy = $sortBy;
    }

    /**
     * @param string $sortOrder
     */
    public function setSortOrder($sortOrder = 'desc')
    {
        $this->sortOrder = $sortOrder;
    }
}
