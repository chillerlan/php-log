<?php
/**
 * Class LogOptions
 *
 * @filesource   LogOptions.php
 * @created      04.01.2018
 * @package      chillerlan\Logger
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger;

use chillerlan\Traits\Container;
use Psr\Log\LogLevel;

/**
 * @property string $minLogLevel
 * @property string $consoleFormat
 * @property string $consoleDateFormat
 */
class LogOptions{
	use Container;

	/**
	 * @see \Psr\Log\LogLevel
	 * @var string
	 */
	protected $minLogLevel = LogLevel::NOTICE;

	/**
	 * @see sprintf()
	 * @var string
	 */
	protected $consoleFormat = '[%1$s][%2$10s] %3$s';

	/**
	 * @see date()
	 * @var string
	 */
	protected $consoleDateFormat = 'c';
}
