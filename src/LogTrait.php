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

use Psr\Log\{LoggerInterface, LogLevel};

/**
 *
 * @implements \Psr\Log\LoggerAwareInterface
 * @implements \Psr\Log\LoggerInterface
 */
trait LogTrait{

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
	protected function log($level, $message, array $context = null){

		if($this->log instanceof LoggerInterface){
			$this->log->log($level, $message, $context ?? []);
		}

	}

	/**
	 * System is unusable.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function emergency($message, array $context = null){
		$this->log(LogLevel::EMERGENCY, $message, $context);
	}

	/**
	 * Action must be taken immediately.
	 *
	 * Example: Entire website down, database unavailable, etc. This should
	 * trigger the SMS alerts and wake you up.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function alert($message, array $context = null){
		$this->log(LogLevel::ALERT, $message, $context);
	}

	/**
	 * Critical conditions.
	 *
	 * Example: Application component unavailable, unexpected exception.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function critical($message, array $context = null){
		$this->log(LogLevel::CRITICAL, $message, $context);
	}

	/**
	 * Runtime errors that do not require immediate action but should typically
	 * be logged and monitored.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function error($message, array $context = null){
		$this->log(LogLevel::ERROR, $message, $context);
	}

	/**
	 * Exceptional occurrences that are not errors.
	 *
	 * Example: Use of deprecated APIs, poor use of an API, undesirable things
	 * that are not necessarily wrong.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function warning($message, array $context = null){
		$this->log(LogLevel::WARNING, $message, $context);
	}

	/**
	 * Normal but significant events.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function notice($message, array $context = null){
		$this->log(LogLevel::NOTICE, $message, $context);
	}

	/**
	 * Interesting events.
	 *
	 * Example: User logs in, SQL logs.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function info($message, array $context = null){
		$this->log(LogLevel::INFO, $message, $context);
	}

	/**
	 * Detailed debug information.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return void
	 */
	protected function debug($message, array $context = null){
		$this->log(LogLevel::DEBUG, $message, $context);
	}

}
