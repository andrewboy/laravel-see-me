<?php namespace Andrewboy\LaravelSeeMe;

use Andrewboy\SeeMe\SeeMeGateway;
use Psr\Log\LoggerInterface;

class SeeMe
{
    /**
     * The log writer instance.
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    /**
     * @var SeeMeGateway
     */
    protected $gateway;
    /**
     * @var bool
     */
    protected $logToFile;

    /**
     * SeeMe constructor.
     * @param string $apiKey
     * @param bool $logToFile
     * @param string $format
     * @param string $method
     */
    public function __construct($apiKey, $logToFile = false, $format = SeeMeGateway::FORMAT_JSON, $method = SeeMeGateway::METHOD_CURL)
    {
        $this->logToFile = $logToFile;
        $this->gateway = new SeeMeGateway($apiKey, false, $format, $method);
    }

    /**
     * Set the log writer instance.
     *
     * @param  \Psr\Log\LoggerInterface $logger
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Set API key
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->gateway->setApiKey($apiKey);
    }

    /**
     * Set method
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->gateway->setMethod($method);
    }

    /**
     * Set format
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->gateway->setFormat($format);
    }

    /**
     * Set IP
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->gateway->setIP($ip);
    }

    /**
     * Send message
     * @param $number
     * @param $message
     * @param string $sender
     * @param null $reference
     * @param null $callbackParams
     * @param null $callbackURL
     * @return array
     */
    public function sendSMS(
        $number,
        $message,
        $sender = '',
        $reference = null,
        $callbackParams = null,
        $callbackURL = null)
    {
        $result = $this->gateway->sendSMS(
            $number,
            $message,
            $sender,
            $reference,
            $callbackParams,
            $callbackURL
        );

        if ($this->logToFile) {
            $this->logger->info($this->gateway->getLog());
        }

        return $result;
    }

    /**
     * Get result of the send
     * @return string
     */
    public function getResult()
    {
        return $this->gateway->getResult();
    }

    /**
     * Get balance
     * @return array
     */
    public function getBalance()
    {
        return $this->gateway->getBalance();
    }

    /**
     * Get log text
     * @return mixed
     */
    public function getLog()
    {
        return $this->gateway->getLog();
    }
}