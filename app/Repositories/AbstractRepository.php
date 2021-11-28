<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function getAll()
    {
       return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $this->model->find($id)->update($data);

        return [
            'message' => 'success'
        ];
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();

        return [
            'message' => 'deleted'
        ];
    }

    protected function resolveModel()
    {
        return app($this->model);
    }
}
