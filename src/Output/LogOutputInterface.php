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

use Psr\Log\LogLevel;

/**
 */
interface LogOutputInterface{

	const E_NULL      = 0x00;
	const E_ALL       = 0xff;

	const E_DEBUG     = 0x01;
	const E_INFO      = 0x02;
	const E_NOTICE    = 0x04;
	const E_WARNING   = 0x08;
	const E_ERROR     = 0x10;
	const E_CRITICAL  = 0x20;
	const E_ALERT     = 0x40;
	const E_EMERGENCY = 0x80;

	const LEVELS = [
		LogLevel::DEBUG     => self::E_DEBUG,
		LogLevel::INFO      => self::E_INFO,
		LogLevel::NOTICE    => self::E_NOTICE,
		LogLevel::WARNING   => self::E_WARNING,
		LogLevel::ERROR     => self::E_ERROR,
		LogLevel::CRITICAL  => self::E_CRITICAL,
		LogLevel::ALERT     => self::E_ALERT,
		LogLevel::EMERGENCY => self::E_EMERGENCY,
	];

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
