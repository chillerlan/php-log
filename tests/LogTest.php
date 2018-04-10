<?php
/**
 * Class LogTest
 *
 * @filesource   LogTest.php
 * @created      04.01.2018
 * @package      chillerlan\LoggerTest
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\LoggerTest;

use chillerlan\Logger\Log;
use chillerlan\Logger\LogOptions;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

abstract class LogTest extends TestCase{

	/**
	 * @var \chillerlan\Logger\Log
	 */
	protected $logger;

	/**
	 * @var \chillerlan\Logger\LogOptions
	 */
	protected $options;

	protected function setUp(){
		$this->options = new LogOptions([
			'logfileDir' => __DIR__,
		]);

		$this->logger = new Log;
	}

	public function testInstance(){
		$this->assertInstanceOf(Log::class, $this->logger);
		$this->assertInstanceOf(LoggerInterface::class, $this->logger);
	}

	public function testLog(){
		$this->logger->emergency('emergency');
		$this->logger->alert('alert');
		$this->logger->critical('critical');
		$this->logger->warning('warning');
		$this->logger->notice('notice');
		$this->logger->info('info');
		$this->logger->debug('debug');
		$this->logger->log('whatever', 'whatever');
		$this->logger->close();

		$this->markTestSkipped();
	}
}
