<?php

namespace Code16\WriteToConsole;

use Psr\Log\LoggerInterface;

/**
 * Decorator for logger interface
 */
class LogConsole
{
    /**
     * Logger instance
     * 
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function info($text)
    {
        $this->logger->info($text);
    }

    public function line($text)
    {
        $this->logger->info($text);
    }

    public function error($text)
    {
        $this->logger->error($text);
    }

    public function comment($text)
    {
        $this->logger->info($text);
    }

}