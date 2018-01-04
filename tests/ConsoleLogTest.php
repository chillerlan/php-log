<?php
/**
 * Class ConsoleLogTest
 *
 * @filesource   ConsoleLogTest
 * @created      04.01.2018
 * @package      chillerlan\LoggerTest
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\LoggerTest;

use chillerlan\Logger\Output\ConsoleLog;

/**
 */
class ConsoleLogTest extends LogTest{

	protected function setUp(){
		parent::setUp();

		$this->logger->addInstance(new ConsoleLog, 'console');
	}

}
