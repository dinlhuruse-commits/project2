<?php
/**
 * Файловый кеш: значения лежат в одном каталоге, имя файла — ключ.
 */

namespace Cache\Store;

class Store
{
	/** @var string */
	private $dir;

	/** @var int */
	private $ttl;

	/**
	 * @param string $dir
	 * @param int $ttl
	 */
	public function __construct($dir, $ttl = 3600)
	{
		$this->dir = rtrim(str_replace('\\\\', '/', $dir), '/') . '/';
		$this->ttl = (int)$ttl;
	}

	/**
	 * @param string $key
	 * @return string
	 */
	private function path($key)
	{
		return $this->dir . preg_replace('#[^a-z0-9_.-]#i', '_', $key) . '.cache';
	}

	/**
	 * @param string $key
	 * @return bool
	 */
	public function has($key)
	{
		$f = $this->path($key);
		return is_file($f) && (time() - filemtime($f) < $this->ttl);
	}

	/**
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		if (!$this->has($key)) { return $default; }
		$raw = @file_get_contents($this->path($key));
		if ($raw === false) { return $default; }
		$data = @unserialize($raw);
		return ($data === false) ? $default : $data;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return bool
	 */
	public function set($key, $value)
	{
		return (bool)@file_put_contents($this->path($key), serialize($value));
	}

	/**
	 * @param string $key
	 * @return bool
	 */
	public function forget($key)
	{
		$f = $this->path($key);
		return is_file($f) ? @unlink($f) : true;
	}
}
