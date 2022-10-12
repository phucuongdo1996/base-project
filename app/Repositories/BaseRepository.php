<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Base repository
 *
 * @package   App\Contracts\Repositories
 * @author    Do Phu Cuong <phucuongdo1996@gmail.com>
 * @link      https://laravel.com Laravel(tm) Project
 * @version   8.x
 */
abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * The repository model.
     *
     * @var Model
     */
    protected $model;

    /**
     * The query builder.
     *
     * @var Builder
     */
    protected $query;

    /**
     * Alias for the query limit.
     *
     * @var int
     */
    protected $take;

    /**
     * BaseRepository constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * Make model.
     *
     * @return Model
     * @throws BindingResolutionException
     */
    public function makeModel(): object
    {
        $model = app()->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of " . Model::class);
        }

        return $this->model = $model;
    }

    /**
     * Create multiple data.
     *
     * @param array $data
     * @return Collection
     */
    public function createMultiple(array $data): Collection
    {
        $models = new Collection();

        foreach ($data as $item) {
            $models->push($this->store($item));
        }

        return $models;
    }

    /**
     * Create a record.
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Delete by ID
     *
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function deleteById($id): bool
    {
        return $this->find($id)->delete();
    }

    /**
     *  Delete multiple records.
     *
     * @param array $ids
     * @return int
     */
    public function deleteMultipleById(array $ids): int
    {
        return $this->model->destroy($ids);
    }

    /**
     * Get all.
     *
     * @return Collection|Model[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Find record.
     *
     * @param $id
     * @param bool $withTrashed
     * @return mixed
     */
    public function find($id, bool $withTrashed = false)
    {
        return $this->model
            ->when($withTrashed, function ($query) {
                $query->withTrashed();
            })
            ->find($id);
    }

    /**
     * Create record.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update record by id.
     *
     * @param $id
     * @param array $attributes
     * @return false|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    /**
     * Find or fail.
     *
     * @param $id
     * @param $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * Update or create model
     *
     * @param $conditions
     * @param $attributes
     * @return mixed
     */
    public function updateOrCreate($conditions, $attributes)
    {
        return $this->model->updateOrCreate($conditions, $attributes);
    }
}
