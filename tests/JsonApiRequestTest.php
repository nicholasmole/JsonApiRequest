<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * JsonApiRequestTest
 * 
 * Test Json Api Requests
 * 
 * @author Nicholas Mole
 */
final class JsonApiRequestTest extends TestCase
{
    /**
    * testJsonApiRequestReceivedInvalidNonStringValue
    * 
    * Expect JsonApiRequest to return a TypeError if
    * constructed with a none string argument.
    */
    public function testJsonApiRequestReceivedInvalidNonStringValue(): void
    {
        $this->expectException(TypeError::class);

        new JsonApiRequest(1);
    }

    /**
    * testRequestResultsInResponse
    * 
    * Expect JsonApiRequest to return fetch response from 
    * 'https://jsonplaceholder.typicode.com/todos/1'
    * 
    * (jsonplaceholder is a fake online REST API for testing)
    */

    public function testRequestResultsInResponse(): void
    {

        $expectedResult = '{"userId":1,"id":1,"title":"delectusautautem","completed":false}';

        $resultsFromRequest = new JsonApiRequest('https://jsonplaceholder.typicode.com/todos/1');
   
        $testResults = preg_replace('/\n|\ /', '',  $resultsFromRequest->getResult());
        $this->assertContains(
            $expectedResult,
            $testResults
        );
    }

    /**
    * testRequestResultsInNoResults
    * 
    * Expect JsonApiRequest to fail. Upon failure return
    * the string "Curl request failed. Please check API route";
    *
    * (Upon failure curl_exec returns fa;se)
    */

    public function testRequestResultsInNoResults(): void
    {
        $resultsFromRequest = new JsonApiRequest('https://error');

        $expectedFailedResult = "Curl request failed. Please check API route";

        $this->assertContains(
            $expectedFailedResult,
            $resultsFromRequest->getResult()
        );
    }
}

