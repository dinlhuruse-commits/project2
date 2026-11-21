<?php
/**
 * Request: тонкая часть библиотеки кеша, побочных эффектов нет.
 */

namespace Cache\Store;

class Request
{
	/** @var mixed */
	private $value;

	/**
	 * @param mixed $value
	 */
	public function __construct($value = null)
	{
		$this->value = $value;
	}

	/**
	 * @return mixed
	 */
	public function get()
	{
		return $this->value;
	}

	/**
	 * @param mixed $value
	 * @return $this
	 */
	public function set($value)
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isEmpty()
	{
		return $this->value === null;
	}
}
