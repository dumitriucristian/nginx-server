# This file contains a user story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

Feature:
    In order to prove that the login api is working properly

    Scenario: Login with invalid username and password and you should receive a 401 status code and a json message
        Given I request "/api/login_check" type "POST" with "test@test.com" and "zzzz"
        Then the response status code should be 401
        Then the response should contain "Invalid credentials."


    Scenario: Login with valid credentials and you should receive a token
        Given I request "/api/login_check" type "POST" with "test@test.com" and "test"
        Then the response status code should be 200
        Then the response has token "token"