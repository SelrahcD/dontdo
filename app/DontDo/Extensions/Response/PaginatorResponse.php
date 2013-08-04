<?php namespace DontDo\Extensions\Response;

use Illuminate\Pagination\Paginator;

class PaginatorResponse extends \Illuminate\Http\Response {


	/**
	 * Set the content on the response.
	 *
	 * @param  mixed  $content
	 * @return void
	 */
	public function setContent($content)
	{
		$this->original = $content;

		if($content instanceof Paginator)
		{
			$content = array(
				'data' => $content->getCollection()->toArray(),
				'meta' => array(
					'total'    => $content->getTotal(),
					'next'     => ($content->getCurrentPage() != $content->getLastPage())? $content->getUrl($content->getCurrentPage() + 1) : null,
					'previous' => $content->getCurrentPage() > 1? $content->getUrl($content->getCurrentPage() - 1) : null,
					)
				);
		}

		return parent::setContent($content);
	}
}