<?php
namespace Publitio;

/**
 * @brief This exception is thrown when the server responds with incorrectly formatted JSON.
 *
 * This also happens then the server responds with something that
 * isn't JSON at all, such as HTML code. This can happen when you
 * use a nonexistent %API endpoint (for example, a typo - 'flies/list' instead of 'files/list').
 * This may also happen if an internal server error occurs.
 */
class BadJSONResponse extends \Exception
{
    public function __construct($body, $call_url)
    {
        parent::__construct(
            'The server did not return a valid JSON response. ' .
            "This might be because '$call_url' is not a valid API call URL, " .
            'or an internal server error occured. ' .
            "Raw response:\n$body"
        );
    }
}
