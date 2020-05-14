<?php
namespace Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit\Framework\TestCase;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;


class LoginContext extends TestCase implements Context
{
    private $kernel;
    private $response;
    private $encoder;
    private $entityManager;

    public function __construct(KernelInterface $kernel, UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager)
    {
        $this->kernel = $kernel;
        $this->encoder = $encoder;
        $this->entityManager = $entityManager;
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
     * @Given there is a user :username with password :password
     */
    public function thereIsAUserWithPassword($username, $password)
    {
        $user = new User();
        $password = $this->encoder->encodePassword($user,$password);
        $user->setPassword($password);
        $user->setEmail($username);
        $this->entityManager->persist($user);
        $this->entityManager->flush();


    }



    /**
     *  @When I request :api type :type with :username and :password
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
