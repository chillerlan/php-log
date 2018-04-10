<?php
/**
 * Class ConsoleLog
 *
 * @filesource   ConsoleLog.php
 * @created      04.01.2018
 * @package      chillerlan\Logger\Output
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger\Output;

/**
 */
class ConsoleLog extends LogOutputAbstract{

	/**
	 * @inheritdoc
	 */
	protected function __log(string $level, string $message, array $context = null){
		echo $this->message($level, $message, $context);
	}

	/**
	 * @inheritdoc
	 */
	public function close():LogOutputInterface{
		echo  $this->message('log closed', '~~~');

		return $this;
	}

}
