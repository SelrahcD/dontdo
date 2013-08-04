<?php

use Mockery as m,
	DontDo\Repositories\DontDoRepository,
	DontDo\Exceptions\NotFoundException,
	DontDo\Entities\DontDo;

class DontDoControllerTest extends TestCase {

	public function tearDown()
	{
		m::close();
	}

	public function setUp()
	{
		parent::setUp();

		$this->mocks = $this->getMocks();
	}

	public function testWeCanListAllDontDo()
	{
		$this->app->instance('DontDo\Repositories\DontDoRepository', $this->mocks['dontDoRepository']);

		$this->mocks['dontDoRepository']->shouldReceive('getAllPaginated')->once()->andReturn('foo');

		$response = $this->call('GET', 'api/dontdo');
		$this->assertInstanceOf('DontDo\Extensions\Response\PaginatorResponse', $response);
		$this->assertEquals('foo', $response->getOriginalContent());
	}

	/**
	 * @expectedException \DontDo\Exceptions\NotFoundException
	 */
	public function testIfWeCantFindRequestedDontDoThrowNotFoundException()
	{
		$this->app->instance('DontDo\Repositories\DontDoRepository', $this->mocks['dontDoRepository']);

		$this->mocks['dontDoRepository']->shouldReceive('getById')->once()->with(1)->andReturn(null);

		$this->call('GET', 'api/dontdo/1');
	}

	public function testIfWeCanGetRequestedDontDoReturnIt()
	{
		$this->app->instance('DontDo\Repositories\DontDoRepository', $this->mocks['dontDoRepository']);

		$this->mocks['dontDoRepository']->shouldReceive('getById')->once()->with(1)->andReturn(new DontDo);

		$response = $this->call('GET', 'api/dontdo/1');
		$this->assertInstanceOf('DontDo\Entities\DontDo', $response->getOriginalContent());
	}

	protected function getMocks()
	{
		$dontDoRepositoryOriginal = $this->app->make('DontDo\Repositories\DontDoRepository');
		$dontDoRepository = m::mock($dontDoRepositoryOriginal);


		return array(
			'dontDoRepository' => $dontDoRepository,
			);
	}
	
}