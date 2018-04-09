<?php
/**
 * Trait LogTrait
 *
 * @filesource   LogTrait.php
 * @created      08.01.2018
 * @package      chillerlan\Logger
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger;

use Psr\Log\{
	LoggerInterface, LoggerTrait, LogLevel
};

/**
 *
 * @implements \Psr\Log\LoggerAwareInterface
 * @implements \Psr\Log\LoggerInterface
 */
trait LogTrait{
	use LoggerTrait;

	/**
	 * @var \Psr\Log\LoggerInterface
	 */
	protected $log;

	/**
	 * Sets a logger.
	 *
	 * @param \Psr\Log\LoggerInterface $logger
	 *
	 * @return void
	 */
	public function setLogger(LoggerInterface $logger){
		$this->log = $logger;
	}

	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed  $level
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	public function log($level, $message, array $context = []){

		if($this->log instanceof LoggerInterface){
			$this->log->log($level, $message, $context);
		}

	}

}
