Feature: In order to prove that register feature is working

  Scenario Outline: I can register users with different roles
   Examples:
    |username|password|role|
    |test@test2.com|test|ADMIN|
    |test@test3.com|test|SUPER_ADMIN|
    |test@test4.com|test|TEACHER|
    |test@test5.com|test|STUDENT|
    When I request "/register" type "POST" with email "<username>" and password "<password>" as role "<role>"
    Then the response should have username "<username>" with role "<role>"

  Scenario: Test imbo api for register
    Given the request body is:
    """
    {
      "username":"test@test.com",
      "password":"test",
      "role":"SUPER_ADMIN"
    }
    """
    When I request "/register" using HTTP "POST"
    Then the response body contains JSON:
    """
    {
        "status":"ok",
        "data": {
            "user": {
                "email": "test@test.com",
                "roles": [
                    "ROLE_SUPER_ADMIN",
                    "ROLE_USER"
                ]
            }
        }
    }
    """

  Scenario: Get all users
    Given I am authenticating as "test@test.com" with "test"
    When I request "/api/users" using HTTP "GET"
    Then the response body contains an array of users





