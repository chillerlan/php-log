<?php
/**
 * Class EmailLog
 *
 * @filesource   EmailLog.php
 * @created      04.01.2018
 * @package      chillerlan\Logger\Output
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\Logger\Output;

use chillerlan\Traits\ImmutableSettingsInterface;
use PHPMailer\PHPMailer\PHPMailer;

/**
 */
class EmailLog extends LogOutputAbstract{

	protected $mailer;

	/** @noinspection PhpMissingParentConstructorInspection */
	/**
	 * EmailLog constructor.
	 *
	 * @param \chillerlan\Traits\ImmutableSettingsInterface|null $options
	 * @param \PHPMailer\PHPMailer\PHPMailer     $mailer
	 */
	public function __construct(ImmutableSettingsInterface $options, PHPMailer $mailer){
		$this->options = $options;
		$this->mailer  = $mailer;
	}

	protected function __log(string $level, string $message, array $context = null){
		// TODO: Implement log() method.
	}

}
