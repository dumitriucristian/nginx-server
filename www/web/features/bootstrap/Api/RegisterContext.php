<?php

namespace Api;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Behat\Behat\Context\Context;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityManagerInterface;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Mink\Exception\Exception;


class RegisterContext extends TestCase implements Context
{
    private $kernel;
    private $entityManager;
    private $response;
    private $jsonData;

    public function __construct(KernelInterface $kernel,  EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->kernel = $kernel;
    }

    /**
     * @BeforeScenario
     */

    public function before(BeforeScenarioScope $scope)
    {
        $query = $this->entityManager->createQuery('DELETE FROM App\Entity\User ');
        $query->execute();
    }


    /**
     * @When I request :api type :type with email :email and password :password as role :role
     */
    public function iRequestTypeWithEmailAndPasswordAsRole($api, $type, $email, $password, $role)
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
                json_encode(
                    [
                        "username" => $email,
                        "password" => $password,
                        "role" => $role
                    ]
                )
            );

            $rsp = $this->kernel->handle($request);
            $this->response = $rsp->getContent();

            $this->assertInstanceOf(JsonResponse::class, $rsp);

    }

    /**
     * @Then the response should have username :username with role :role
     */
    public function theResponseShouldHaveUsernameWithRole($username, $role)
    {
        $stringToCheck = '{"status":"ok","data":{"user":{"email":"'.$username.'","roles":["ROLE_'.$role.'","ROLE_USER"]}}}';
        $this->assertJsonStringEqualsJsonString(
            $stringToCheck,
            $this->response
        );

    }


    /**
     * @Given the request body is:
     */
    public function theRequestBodyIs(PyStringNode $string)
    {
        $this->jsonData = $string->getRaw();
    }

    /**
     * @When I request :api using HTTP :type
     */
    public function iRequestUsingHttp($api, $type)
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
            $this->jsonData
        );

        $rsp = $this->kernel->handle($request);
        $this->response = $rsp->getContent();

        $this->assertInstanceOf(JsonResponse::class, $rsp);

    }

    /**
     * @Then the response body contains JSON:
     */
    public function theResponseBodyContainsJson(PyStringNode $string)
    {
       $this->assertJsonStringEqualsJsonString( $string->getRaw(),$this->response );
    }
}
