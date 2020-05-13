Feature:
    In order to prove that the login api is working properly

    Scenario: Login with invalid username and password and you should receive a 401 status code and a json message
        Given I request "/api/login_check" type "POST" with "test@test.com" and "zzzz"
        Then the response status code should be 401
        Then the response should contain "Invalid credentials."

    Scenario: Login with valid credentials and you should receive a token
        Given there is a user "newuser@test.com" with password "test"
        When I request "/api/login_check" type "POST" with "newuser@test.comss" and "test"
        Then the response status code should be 200
        Then the response has token "token"
