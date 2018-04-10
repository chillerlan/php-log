<?php
/**
 * Class FileLogTest
 *
 * @filesource   FileLogTest.php
 * @created      10.04.2018
 * @package      chillerlan\LoggerTest
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\LoggerTest;

use chillerlan\Logger\Output\Logfile;

/**
 */
class FileLogTest extends LogTest{

	protected function setUp(){
		parent::setUp();

		$this->logger->addInstance(new Logfile($this->options), 'file');
	}

}
