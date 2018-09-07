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

use chillerlan\Settings\SettingsContainerAbstract;

/**
 * @property string $minLogLevel
 * @property string $consoleFormat
 * @property string $consoleDateFormat
 * @property string $dbLogTable
 * @property string $logfileDir
 * @property string $logfileName
 * @property string $logfileExt
 */
class LogOptions extends SettingsContainerAbstract{
	use LogOptionsTrait;
}
