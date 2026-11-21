<?php
/**
 * PurgeCommandTest: без phpunit — обычные assert-методы, запускаются руками.
 */

namespace Cache\Store\Tests;

class PurgeCommandTest
{
	public function testSetGet()
	{
		$s = new \Store(sys_get_temp_dir(), 60);
		$s->set('k', 12);
		assert($s->get('k') === 12);
	}

	public function testMiss()
	{
		$s = new \Store(sys_get_temp_dir(), 60);
		assert($s->get('нет такого', null) === null);
	}
}
