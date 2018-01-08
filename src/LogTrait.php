<?php
/**
 * Class LogTrait
 *
 * @filesource   LogTrait.php
 * @created      08.01.2018
 * @package      chillerlan\Logger
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger;

use Psr\Log\LoggerInterface;

/**
 *
 * @implements \Psr\Log\LoggerAwareInterface
 * @implements \Psr\Log\LoggerInterface
 */
class LogTrait{

	/**
	 * @var \chillerlan\Logger\Log
	 */
	private $log;

	/**
	 * Sets a logger.
	 *
	 * @param \Psr\Log\LoggerInterface $logger
	 *
	 * @return $this
	 */
	public function setLogger(LoggerInterface $logger){
		$this->log = $logger;

		return $this;
	}

	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed  $level
	 * @param string $message
	 * @param array  $context
	 *
	 * @return $this
	 */
	protected function log($level, $message, array $context = []){
		$this->log->log($level, $message, $context);

		return $this;
	}

	/**
	 * System is unusable.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return $this
	 */
	protected function emergency($message, array $context = []){
		$this->log->emergency($message, $context);

		return $this;
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
	 * @return $this
	 */
	protected function alert($message, array $context = []){
		$this->log->alert($message, $context);

		return $this;
	}

	/**
	 * Critical conditions.
	 *
	 * Example: Application component unavailable, unexpected exception.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return $this
	 */
	protected function critical($message, array $context = []){
		$this->log->critical($message, $context);

		return $this;
	}

	/**
	 * Runtime errors that do not require immediate action but should typically
	 * be logged and monitored.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return $this
	 */
	protected function error($message, array $context = []){
		$this->log->error($message, $context);

		return $this;
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
	 * @return $this
	 */
	protected function warning($message, array $context = []){
		$this->log->warning($message, $context);

		return $this;
	}

	/**
	 * Normal but significant events.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return $this
	 */
	protected function notice($message, array $context = []){
		$this->log->notice($message, $context);

		return $this;
	}

	/**
	 * Interesting events.
	 *
	 * Example: User logs in, SQL logs.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return $this
	 */
	protected function info($message, array $context = []){
		$this->log->info($message, $context);

		return $this;
	}

	/**
	 * Detailed debug information.
	 *
	 * @param string $message
	 * @param array  $context
	 *
	 * @return $this
	 */
	protected function debug($message, array $context = []){
		$this->log->debug($message, $context);

		return $this;
	}

}
