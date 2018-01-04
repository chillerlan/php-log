<?php
/**
 * Class Logfile
 *
 * @filesource   Logfile.php
 * @created      04.01.2018
 * @package      chillerlan\Logger\Output
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger\Output;

/**
 */
class Logfile extends ConsoleLog{

	public function log(string $level, string $message, array $context = null){
		$data = $this->message($level, $message, $context);
		// ... @todo
	}

}
