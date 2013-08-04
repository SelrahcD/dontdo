<?php

use DontDo\Repositories\DontDoRepository,
	DontDo\Exceptions\NotFoundException;

class DontDoController extends BaseController {

	/**
	 * DontDo Repository
	 * 
	 * @var DontDo\Repositories\DontDoRepository
	 */
	protected $dontDoRepository;

	/**
	 * Conctructor
	 * 
	 * @param DontDo\Repositories\DontDoRepository $dontDoRepository
	 */
	function __construct(DontDoRepository $dontDoRepository)
	{
		$this->dontDoRepository = $dontDoRepository;
	}

	public function show($dontDoId)
	{
		if(!($dontDo = $this->dontDoRepository->getById($dontDoId)))
		{
			throw new NotFoundException;
		}

		return $dontDo;
	}
	
}