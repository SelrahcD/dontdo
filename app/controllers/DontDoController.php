<?php

use DontDo\Repositories\DontDoRepository,
	DontDo\Exceptions\NotFoundException,
	DontDo\Extensions\Response\PaginatorResponse;

class DontDoController extends BaseController {

	/**
	 * DontDo Repository
	 * 
	 * @var DontDo\Repositories\DontDoRepository
	 */
	protected $dontDoRepository;

	/**
	 * Number of elements to display in one page
	 * @var int
	 */
	const PAGE_SIZE = 10;  

	/**
	 * Conctructor
	 * 
	 * @param DontDo\Repositories\DontDoRepository $dontDoRepository
	 */
	function __construct(DontDoRepository $dontDoRepository)
	{
		$this->dontDoRepository = $dontDoRepository;
	}

	public function listAll()
	{
		// Temp
		return $this->dontDoRepository->getAll();

		$paginator = $this->dontDoRepository->getAllPaginated(self::PAGE_SIZE);

		return new PaginatorResponse($paginator);
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