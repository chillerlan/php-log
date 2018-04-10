<?php
/**
 * Trait LogOptionsTrait
 *
 * @filesource   LogOptionsTrait.php
 * @created      01.02.2018
 * @package      chillerlan\Logger
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\Logger;

use Psr\Log\LogLevel;

trait LogOptionsTrait{

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

	/**
	 * a database table for the log
	 *
	 * @var string
	 */
	protected $dbLogTable;

	/**
	 * @var string
	 */
	protected $logfileDir;

	/**
	 * @var string
	 */
	protected $logfileName = 'php-logger';

	/**
	 * @var string
	 */
	protected $logfileExt = 'log';

}
