<?php

namespace Api;

use Symfony\Component\HttpFoundation\Request;
use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit\Framework\TestCase;

/**
 * Defines application features from the specific context.
 */
class RegisterContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(KernelInterface $kernel)
    {

    }
}
