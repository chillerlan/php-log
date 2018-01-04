<?php
/**
 * Interface LogOutputInterface
 *
 * @filesource   LogOutputInterface.php
 * @created      04.01.2018
 * @package      chillerlan\Logger\Output
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger\Output;

/**
 */
interface LogOutputInterface{

	/**
	 * @param string     $level
	 * @param string     $message
	 * @param array|null $context
	 */
	public function log(string $level, string $message, array $context = null);

	/**
	 * this method is being called in LogOutputInterface::__destruct()
	 *
	 * @return \chillerlan\Logger\Output\LogOutputInterface
	 */
	public function close():LogOutputInterface;

}
