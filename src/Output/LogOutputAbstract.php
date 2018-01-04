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

/**
 *
 */
abstract class LogOutputAbstract implements LogOutputInterface{

	/**
	 * @var \chillerlan\Logger\LogOptions
	 */
	protected $options;

	public function __construct(LogOptions $options = null){
		$this->options = $options ?? new LogOptions;
	}

	public function __destruct(){
		$this->close();
	}

	public function close():LogOutputInterface{
		return $this;
	}

}
