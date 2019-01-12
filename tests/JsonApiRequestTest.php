<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * JsonApiRequestTest
 * 
 * @author     Nicholas Mole
 */
final class JsonApiRequestTest extends TestCase
{
    public function testJsonApiRequestCanBeConstructed(): void
    {
        $this->assertInstanceOf(
            JsonApiRequest::class,
            JsonApiRequest::request('https://jsonplaceholder.typicode.com/todos/1')
        );
    }

    public function testJsonApiRequestReceivedInvalidNonStringValue(): void
    {
        $this->assertInstanceOf(
            JsonApiRequest::class,
            JsonApiRequest::request(1)
        );
    }

    public function testRequestResultInValidArrayOrObject(): void
    {
        $expectedResult = array(
            "userId" => 1,
            "id" => 1,
            "title" => "delectus aut autem",
            "completed" => false
        );
        $this->assertEquals(
            'user@example.com',
            JsonApiRequest::request('user@example.com')
        );
    }

    public function testRequestResultsInError(): void
    {
        
        $this->expectException(InvalidArgumentException::class);

        JsonApiRequest::request('https://error');
    }
}

