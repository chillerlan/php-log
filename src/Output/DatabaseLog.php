<?php
/**
 * Class DatabaseLog
 *
 * @filesource   DatabaseLog.php
 * @created      04.01.2018
 * @package      chillerlan\Logger\Output
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger\Output;

use chillerlan\Database\Connection;
use chillerlan\Logger\LogOptions;

/**
 */
class DatabaseLog extends LogOutputAbstract{

	/**
	 * @var \chillerlan\Database\Connection
	 */
	protected $db;

	/** @noinspection PhpMissingParentConstructorInspection */
	/**
	 * DatabaseLog constructor.
	 *
	 * @param \chillerlan\Logger\LogOptions $options
	 * @param \chillerlan\Database\Connection    $db
	 */
	public function __construct(LogOptions $options, Connection $db){
		$this->options = $options;
		$this->db      = $db;

		$this->db->connect();
	}

	protected function __log(string $level, string $message, array $context = null){
		// TODO: Implement log() method.
	}
}
