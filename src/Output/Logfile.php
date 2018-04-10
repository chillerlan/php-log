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

use chillerlan\Logger\LogException;
use chillerlan\Traits\ContainerInterface;

/**
 */
class Logfile extends LogOutputAbstract{

	/**
	 * @var bool|resource
	 */
	protected $fh;

	/**
	 * Logfile constructor.
	 *
	 * @param \chillerlan\Traits\ContainerInterface|null $options
	 *
	 * @throws \chillerlan\Logger\LogException
	 */
	public function __construct(ContainerInterface $options = null){
		parent::__construct($options);

		if(!is_writable($this->options->logfileDir)){
			throw new LogException('log file directory inaccessible');
		}

		$logfile = $this->options->logfileDir.'/'.$this->options->logfileName.'-'.date('Y-m-d').'.'.$this->options->logfileExt;

		$this->fh = fopen($logfile, 'a+');
	}

	/**
	 * @inheritdoc
	 */
	public function __destruct(){
		$this->close();

		if(gettype($this->fh) === 'resource'){
			fclose($this->fh);
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function __log(string $level, string $message, array $context = null){
		fwrite($this->fh, $this->message($level, $message, $context));
	}

	/**
	 * @inheritdoc
	 */
	public function close():LogOutputInterface{
		$this->__log('log closed', '~~~');
		return $this;
	}

}
