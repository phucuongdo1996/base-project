<?php

namespace App\Contracts\Repositories;

/**
 * Base repository interface
 *
 * @package   App\Contracts\Repositories
 * @author    Do Phu Cuong <phucuongdo1996@gmail.com>
 * @link      https://laravel.com Laravel(tm) Project
 * @version   8.x
 */
interface BaseRepositoryInterface
{
    /**
     * Get all data.
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Find by id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create data.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update data.
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Create multiple data.
     *
     * @param array $data
     * @return mixed
     */
    public function createMultiple(array $data);

    /**
     * Create data.
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * Delete by id.
     *
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * Delete many by id.
     *
     * @param array $ids
     * @return mixed
     */
    public function deleteMultipleById(array $ids);

    /**
     * Find or fail
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, array $columns = ['*']);

    /**
     * Update or create model
     *
     * @param $conditions
     * @param $attributes
     * @return mixed
     */
    public function updateOrCreate($conditions, $attributes);
}
