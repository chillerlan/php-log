<?php
/**
 * Class Log
 *
 * @filesource   Log.php
 * @created      04.01.2018
 * @package      chillerlan\Logger
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger;

use chillerlan\Logger\Output\LogOutputInterface;
use Psr\Log\{LoggerInterface, LogLevel};

/**
 */
class Log implements LoggerInterface{

	/**
	 * @var \chillerlan\Logger\LogOptions
	 */
	protected $options;

	/**
	 * @var \chillerlan\Logger\Output\LogOutputInterface[]
	 */
	protected $instances = [];

	/**
	 *
	 */
	public function __destruct(){
		$this->close();
	}

	/**
	 * closes all remaining logger instances
	 *
	 * @return \chillerlan\Logger\Log
	 */
	public function close():Log{

		if(!empty($this->instances)){
			foreach($this->instances as $instanceName => $instance){
				unset($this->instances[$instanceName]);
			}
		}

		return $this;
	}

	/**
	 * @param \chillerlan\Logger\Output\LogOutputInterface $logger
	 * @param string                                       $instanceName
	 *
	 * @return \chillerlan\Logger\Log
	 */
	public function addInstance(LogOutputInterface $logger, string $instanceName = null):Log{
		$this->instances[$instanceName ?? 'default'] = $logger;

		return $this;
	}

	/**
	 * @param string $instanceName
	 *
	 * @return \chillerlan\Logger\Output\LogOutputInterface
	 * @throws \chillerlan\Logger\LogException
	 */
	public function getInstance(string $instanceName):LogOutputInterface{

		if(!array_key_exists($instanceName, $this->instances)){
			throw new LogException('invalid logger instance: '.$instanceName);
		}

		return $this->instances[$instanceName];
	}

	/**
	 * @param string $instanceName
	 *
	 * @return \chillerlan\Logger\Log
	 * @throws \chillerlan\Logger\LogException
	 */
	public function removeInstance(string $instanceName):Log{

		if(!array_key_exists($instanceName, $this->instances)){
			throw new LogException('invalid logger instance: '.$instanceName);
		}

		unset($this->instances[$instanceName]);

		return $this;
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

		foreach($this->instances as $logger){
			$logger->log($level, $message, $context);
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
	public function emergency($message, array $context = []){
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
	public function alert($message, array $context = []){
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
	public function critical($message, array $context = []){
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
	public function error($message, array $context = []){
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
	public function warning($message, array $context = []){
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
	public function notice($message, array $context = []){
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
	public function info($message, array $context = []){
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
	public function debug($message, array $context = []){
		$this->log(LogLevel::DEBUG, $message, $context);
	}

}
