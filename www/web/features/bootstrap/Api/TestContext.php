<?php



namespace Api;

use Symfony\Component\HttpFoundation\Request;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Mink\Session;
use Behat\Behat\Tester\Exception\PendingException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\BrowserKit;
use Symfony\Component\HttpClient\HttpClient;

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

    private $kernel;
    private $session;
    private $browser;


    public function __construct(KernelInterface $kernel, Session $session)
    {
        $this->session = $session;
        $this->kernel = $kernel;

    }

    /**
     * @When a demo scenario sends a request to :arg1
     */
    public function aDemoScenarioSendsARequestTo($arg1)
    {
       $request = Request::create(
            '/api/login_check',
            'POST',
            [],
            [],
            [],
            [
                'SERVER_PORT' => 8080,
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(["username"=>"test","password"=>"test"])
        );

        $response = $this->kernel->handle( $request );

       dd($response);
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
