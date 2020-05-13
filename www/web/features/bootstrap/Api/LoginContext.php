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
class LoginContext extends TestCase implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */

    private $kernel;
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }


    /**
     *  @Given I request :api type :type with :username and :password
     */
    public function  iRequestTypeWithAnd($api, $type, $username, $password) : void
    {
        $request = Request::create(
            $api,
            $type,
            [],
            [],
            [],
            [
                'SERVER_PORT' => 8080,
                'CONTENT_TYPE' => 'application/json'
            ],
            json_encode(["username" => $username, "password" => $password])
        );

        $this->response = $this->kernel->handle($request);

        $this->assertInstanceOf(Response::class, $this->response);
    }

    /**
     * @Then the response status code should be :statusCode
     */
    public function theResponseStatusCodeShouldBe($statusCode) : void
    {
       $this->assertEquals($statusCode,$this->response->getStatusCode());
    }


    /**
     * @Then the response should contain :string
     */
    public function theResponseShouldContain($string) : void
    {
        $this->assertEquals($string, $this->response->getMessage());
    }

    /**
     * @Then the response has token :token
     */
    public function theResponseHasToken($token) : void
    {
        $this->assertObjectHasAttribute($token, json_decode($this->response->getContent()));
    }






}
