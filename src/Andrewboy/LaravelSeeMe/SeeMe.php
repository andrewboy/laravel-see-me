<?php namespace Andrewboy\LaravelSeeMe;

use Psr\Log\LoggerInterface;

class SeeMe
{
    /**
     * The log writer instance.
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    protected $gateway;

    public function __construct($apiKey, $logFileDestination = false, $format = SeeMeGateway::FORMAT_JSON, $method = SeeMeGateway::METHOD_CURL)
    {
        $this->gateway = new SeeMeGateway($apiKey, $logFileDestination, $format, $method);
    }

    /**
     * Set the log writer instance.
     *
     * @param  \Psr\Log\LoggerInterface  $logger
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    public function setApiKey($apiKey)
    {
        $this->gateway->setApiKey($apiKey);
    }

    public function setMethod($method)
    {
        $this->gateway->setMethod($method);
    }

    public function setFormat($format)
    {
        $this->gateway->setFormat($format);
    }

    public function setIp($ip)
    {
        $this->gateway->setIP($ip);
    }

}