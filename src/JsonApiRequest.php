<?php
declare(strict_types=1);

namespace NicholasMole\JsonApiRequest;

/**
 * JsonApiRequest
 * 
 * Use php Curl Library for REST API requests.
 * @author Nicholas Mole
 */
final class JsonApiRequest
{
    /**
     * @param string $result - REST API result
     */
    private $result;

    /**
     * Constructor
     * Requires request rest api url
     * 
     * @param string $request - REST API result
     */
    public function __construct(string $request)
    {
        $this->ensureIsValidRequestInput($request);

        $this->result = $this->getJsonResponse($request);

    }

    /**
     * ensureIsValidRequestInput
     * Validates constructor input as string
     * 
     * @param string $request - REST API result
     */
    private function ensureIsValidRequestInput(string $request): void
    {
        if (!is_string($request)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid input type string',
                    $request
                )
            );
        }
    }

    /**
     * getJsonResponse
     * Get the json response.
     * Stores as $result in constructor
     * 
     * Upon failure curl_exec() returns false.
     * Convert false to string response.
     * 
     * @param string $request - REST API result
     */
    private function getJsonResponse(string $request): string
    {
        $curl_session = curl_init();
        curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_session, CURLOPT_URL, $request);
        $result = curl_exec($curl_session);
        curl_close($curl_session);

        if ($result === false) {
            return 'Curl request failed. Please check API route';
        }
        return $result;
    }

    /**
     * getResult
     * Get the result from JsonApiRequest Curl request
     * 
     */
    public function getResult(): string
    {
        return $this->result;
    }
}
