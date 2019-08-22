<?php
namespace Publitio;

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
