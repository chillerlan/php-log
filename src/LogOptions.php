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

/**
 * @property string $consoleFormat
 * @property string $consoleDateFormat
 */
class LogOptions{
	use Container;

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
