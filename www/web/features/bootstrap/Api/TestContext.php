<?php

namespace Api;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Defines application features from the specific context.
 */
class TestContext implements Context
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

    /**
     * @When a demo scenario sends a request to :arg1
     */
    public function aDemoScenarioSendsARequestTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived()
    {
        throw new PendingException();
    }

}
