<?php
/**
 * ChainAdapterTest: без phpunit — обычные assert-методы, запускаются руками.
 */

namespace Cache\Store\Tests;

class ChainAdapterTest
{
	public function testSetGet()
	{
		$s = new \Store(sys_get_temp_dir(), 60);
		$s->set('k', 11);
		assert($s->get('k') === 11);
	}

	public function testMiss()
	{
		$s = new \Store(sys_get_temp_dir(), 60);
		assert($s->get('нет такого', null) === null);
	}
}
