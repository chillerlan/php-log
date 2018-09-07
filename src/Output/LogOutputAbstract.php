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
use chillerlan\Settings\SettingsContainerInterface;

/**
 *
 */
abstract class LogOutputAbstract implements LogOutputInterface{

	/**
	 * @var \chillerlan\Logger\LogOptions
	 */
	protected $options;

	/**
	 * LogOutputAbstract constructor.
	 *
	 * @param \chillerlan\Settings\SettingsContainerInterface|null $options
	 */
	public function __construct(SettingsContainerInterface $options = null){
		$this->options = $options ?? new LogOptions;
	}

	/**
	 * @inheritdoc
	 */
	public function __destruct(){
		$this->close();
	}

	/**
	 * @inheritdoc
	 */
	public function close():LogOutputInterface{
		return $this;
	}

	/**
	 * @param string $level
	 * @param string $message
	 * @param array  $context
	 *
	 * @return mixed
	 */
	abstract protected function __log(string $level, string $message, array $context = []);

	/**
	 * @inheritdoc
	 */
	public function log(string $level, string $message, array $context = []){ // @todo: loglevel bitmask
		if((array_key_exists($level, $this::LEVELS) && $this::LEVELS[$level] >= $this::LEVELS[$this->options->minLogLevel]) || (!array_key_exists($level, $this::LEVELS) && !empty($level))){
			$this->__log($level, $message, $context);
		}
	}

	/**
	 * @param string     $level
	 * @param string     $message
	 * @param array|null $context
	 *
	 * @return string
	 */
	protected function message(string $level, string $message, array $context = null){
		return sprintf($this->options->consoleFormat, date($this->options->consoleDateFormat), $level, $message).PHP_EOL;
	}

}
