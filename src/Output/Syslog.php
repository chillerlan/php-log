<?php
/**
 * Class Syslog
 *
 * @filesource   Syslog.php
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
class Syslog extends LogOutputAbstract{

	const syslogLevels = [
		LogLevel::DEBUG     => LOG_DEBUG,
		LogLevel::INFO      => LOG_INFO,
		LogLevel::NOTICE    => LOG_NOTICE,
		LogLevel::WARNING   => LOG_WARNING,
		LogLevel::ERROR     => LOG_ERR,
		LogLevel::CRITICAL  => LOG_CRIT,
		LogLevel::ALERT     => LOG_ALERT,
		LogLevel::EMERGENCY => LOG_EMERG,
	];

	protected function __log(string $level, string $message, array $context = null){
		syslog($this::syslogLevels[$level], $message);
	}

}
