<?php namespace DontDo\Repositories;

use DontDo\Entities\DontDo;

class DontDoDatabaseRepository implements DontDoRepository {

	protected $model;
	
	public function __construct(DontDo $model)
	{
		$this->model = $model;
	}

	public function getById($id)
	{
		return $this->model->find($id);
	}

	public function getAll()
	{
		return $this->model->all();
	}
}