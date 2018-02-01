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

use chillerlan\Traits\ContainerAbstract;

/**
 * @property string $minLogLevel
 * @property string $consoleFormat
 * @property string $consoleDateFormat
 */
class LogOptions extends ContainerAbstract{
	use LogOptionsTrait;
}
