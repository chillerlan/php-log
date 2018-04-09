<?php
/**
 * Class LogOutputAbstract
 *
 * @filesource   LogOutputAbstract.php
 * @created      04.01.2018
 * @package      chillerlan\Logger\Output
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger\Output;

use chillerlan\Logger\LogOptions;
use chillerlan\Traits\ContainerInterface;

/**
 *
 */
abstract class LogOutputAbstract implements LogOutputInterface{

	/**
	 * @var \chillerlan\Logger\LogOptions
	 */
	protected $options;

	public function __construct(ContainerInterface $options = null){
		$this->options = $options ?? new LogOptions;
	}

	public function __destruct(){
		$this->close();
	}

	public function close():LogOutputInterface{
		return $this;
	}

	abstract protected function __log(string $level, string $message, array $context = null);

	public function log(string $level, string $message, array $context = null){ // @todo: loglevel bitmask
		if((array_key_exists($level, $this::LEVELS) && $this::LEVELS[$level] >= $this::LEVELS[$this->options->minLogLevel]) || (!array_key_exists($level, $this::LEVELS) && !empty($level))){
			$this->__log($level, $message, $context);
		}
	}

}
