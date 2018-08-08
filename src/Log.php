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
use Psr\Log\{LoggerInterface, LoggerTrait};

class Log implements LoggerInterface{
	use LoggerTrait;

	/**
	 * @var \chillerlan\Logger\Output\LogOutputInterface[]
	 */
	protected $logOutputInterfaces = [];

	/**
	 * @return void
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

		if(!empty($this->logOutputInterfaces)){
			foreach($this->logOutputInterfaces as $instanceName => $instance){
				unset($this->logOutputInterfaces[$instanceName]);
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
		$this->logOutputInterfaces[$instanceName ?? 'default'] = $logger;

		return $this;
	}

	/**
	 * @param string $instanceName
	 *
	 * @return \chillerlan\Logger\Output\LogOutputInterface
	 * @throws \chillerlan\Logger\LogException
	 */
	public function getInstance(string $instanceName):LogOutputInterface{

		if(!array_key_exists($instanceName, $this->logOutputInterfaces)){
			throw new LogException('invalid logger instance: '.$instanceName);
		}

		return $this->logOutputInterfaces[$instanceName];
	}

	/**
	 * @param string $instanceName
	 *
	 * @return \chillerlan\Logger\Log
	 * @throws \chillerlan\Logger\LogException
	 */
	public function removeInstance(string $instanceName):Log{

		if(!array_key_exists($instanceName, $this->logOutputInterfaces)){
			throw new LogException('invalid logger instance: '.$instanceName);
		}

		unset($this->logOutputInterfaces[$instanceName]);

		return $this;
	}

	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed       $level
	 * @param string      $message
	 * @param array       $context
	 *
	 * @param string|null $instance
	 *
	 * @return void
	 */
	public function log($level, $message, array $context = [], string $instance = null):void{

		foreach($this->logOutputInterfaces as $logger){
			$logger->log($level, $message, $context);
		}

	}

}
