<?php namespace DontDo\Repositories;

interface DontDoRepository {

	public function getById($id);
	
	public function getAll();

	public function getAllPaginated($nbElement = 10);
}