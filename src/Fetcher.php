<?php
/**
 * Тонкая обёртка над http: curl, а без него — обычный поток.
 */

namespace Cache\Store;

class Fetcher
{
	/** @var int */
	private $timeout;

	/**
	 * @param int $timeout
	 */
	public function __construct($timeout = 10)
	{
		$this->timeout = (int)$timeout;
	}

	/**
	 * @param string $url
	 * @return string
	 */
	public function get($url)
	{
		$out = '';
		if (function_exists('curl_init')) {
			$h = @curl_init($url);
			if ($h) {
				@curl_setopt($h, CURLOPT_RETURNTRANSFER, 1);
				@curl_setopt($h, CURLOPT_FOLLOWLOCATION, 1);
				@curl_setopt($h, CURLOPT_TIMEOUT, $this->timeout);
				$out = (string)@curl_exec($h);
				@curl_close($h);
			}
			return $out;
		}
		if (!ini_get('allow_url_fopen')) { return $out; }
		$ctx = @stream_context_create(array('http' => array('timeout' => $this->timeout)));
		return (string)@file_get_contents($url, false, $ctx);
	}
}
