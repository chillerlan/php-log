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

use chillerlan\Database\Database;
use chillerlan\Settings\SettingsContainerInterface;

class DatabaseLog extends LogOutputAbstract{

	/**
	 * @var \chillerlan\Database\Database
	 */
	protected $db;

	/** @noinspection PhpMissingParentConstructorInspection */
	/**
	 * DatabaseLog constructor.
	 *
	 * @param \chillerlan\Settings\SettingsContainerInterface|null $options
	 * @param \chillerlan\Database\Database    $db
	 */
	public function __construct(SettingsContainerInterface $options, Database $db){
		$this->options = $options;
		$this->db      = $db;

		$this->db->connect();
	}

	/**
	 * @inheritdoc
	 */
	protected function __log(string $level, string $message, array $context = []){

		// TODO: $context, tests
		$this->db->insert
			->into($this->options->dbLogTable)
			->values([
				'level'   => $level,
				'message' => $message,
				'context' => json_encode($context),
				'time'    => time(),
			])
			->query()
		;
	}

	/**
	 * @inheritdoc
	 */
	public function close():LogOutputInterface{
		$this->db->disconnect();

		return $this;
	}

}
