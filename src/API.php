<?php
namespace Publitio;

require_once __DIR__ . '/random_compat-2.0.18/lib/random.php';

/**
 * @brief API presents the main interface to the Publitio RESTful %API.
 *
 * You can find more documentation about Publitio at https://publit.io/docs.
 */
class API
{
    public static $VERSION = '2.0.0';

    private $key;
    private $secret;
    private $client;

    private static function getNonce()
    {
        return \random_int(10000000, 99999999);
    }

    private static function getTimestamp()
    {
        return time();
    }

    private static function getKit()
    {
        return "php-" . self::$VERSION;
    }

    private static function addQuery($url, $args)
    {
        return $url . '?' . http_build_query($args, '', '&');
    }

    private static function actionUrl($action)
    {
        switch ($action) {
            case 'file':
                return 'files/create';
            case 'watermark':
                return 'watermarks/create';
        }

        throw new \Exception("Unknown action $action");
    }

    /**
     * @param string $key Your %API key. You can find your %API
     *                    key on your Publitio dashboard at https://publit.io/dashboard.
     * @param string $secret Your %API secret. You can find your %API
     *                       secret on your Publitio dashboard at https://publit.io/dashboard.
     */
    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->client = new \GuzzleHttp\Client(array(
            'base_uri' => 'http://api.publit.io/v1/',
            'http_errors' => false,
        ));
    }

    private function getSignature($timestamp, $nonce)
    {
        return sha1("$timestamp$nonce$this->secret");
    }

    private function removeLeadingSlashes($url)
    {
        $i = 0;
        while ($i < strlen($url) && $url[$i] === '/') {
            ++$i;
        }
        return substr($url, $i, strlen($url) - $i);
    }

    /**
     * Adds the standard API query arguments to `$args`.
     * These are the arguments that must be present in each Publitio API call,
     * such as 'api_key' and 'api_signature'.
     *
     * @param array $args User's query arguments.
     */
    private function addApiArgs(&$args)
    {
        $timestamp = self::getTimestamp();
        $nonce = self::getNonce();
        $signature = $this->getSignature($timestamp, $nonce);
        $args['api_key'] = $this->key;
        $args['api_timestamp'] = $timestamp;
        $args['api_nonce'] = $nonce;
        $args['api_signature'] = $signature;
        $args['api_kit'] = self::getKit();
    }

    /**
     * Make an %API call. For a list of avaliable calls, see https://publit.io/docs.
     * Use this method when you aren't going to be uploading any files with the call.
     * If you wish to upload a file, use the `uploadFile` or `uploadRemoteFile` methods.
     *
     * @param string $call_url The %API call endpoint, for example '/files/list'.
     * @param string $method The HTTP method, for example 'GET' or 'DELETE'.
     *                       Which of these you need depends on what kind of call you are making.
     *                       The method for each %API URL is documented at https://publit.io/docs.
     * @param array $args The URL query parameters.
     * @return object The response JSON parsed using `json_decode`.
     * @throws BadJSONResponse when the server returns an invalid JSON reponse.
     *                         Note: if the server is returning an invalid JSON response it is likely
     *                         that `$call_url` is invalid, or perhaps there is an internal server error.
     */
    public function call($call_url, $method = 'GET', $args = array())
    {
        $this->addApiArgs($args);
        $url = self::removeLeadingSlashes($call_url);
        $url = self::addQuery($url, $args);
        $res = $this->client->request($method, $url);
        $json = json_decode($res->getBody());
        if ($json === null) {
            throw new BadJSONResponse($res->getBody(), $call_url);
        }
        return $json;
    }

    /**
     * Upload a file. Use this method when uploading local files
     * from memory. If you wish to upload a file using a remote URL,
     * use `uploadRemoteFile`.
     *
     * @param mixed $file Pass a string to upload the contents of the string, pass an `fopen` resource
     *                    to upload the contents of a PHP stream, or pass a `Psr\Http\Message\StreamInterface`
     *                    to upload the contents of a PSR-7 stream.
     * @param string $action Can be 'file' or 'watermark'. If `$action` is 'file',
     *                       this method will upload a file to the Publitio server.
     *                       If `$action` is 'watermark', this method will upload a
     *                       watermark to the server. If `$action` is anything else,
     *                       an `Exception` will be thrown.
     * @param array $args The URL query parameters.
     * @return object The response JSON parsed using `json_decode`.
     * @throws Exception when `$action` is invalid.
     * @throws BadJSONResponse when the server responds with invalid JSON. This
     *                         might be due to an internal server error.
     */
    public function uploadFile($file, $action = 'file', $args = array())
    {
        $this->addApiArgs($args);
        $url = self::actionUrl($action);
        $url = self::addQuery($url, $args);
        $res = $this->client->request('POST', $url, array(
            'multipart' => array(
                array(
                    'name' => 'file',
                    'contents' => $file,
                ),
            ),
        ));
        $json = json_decode($res->getBody());
        if ($json === null) {
            throw new BadJSONResponse($res->getBody(), $url);
        }
        return $json;
    }

    /**
     * Upload the file at URL `$remote_url` to the server.
     * If you need to upload a file from memory instead, use `uploadFile`.
     *
     * @param string $remote_url The URL of file to upload.
     * @param string $action Can be 'file' or 'watermark'. If `$action` is 'file',
     *                       this method will upload a file to the Publitio server.
     *                       If `$action` is 'watermark', this method will upload a
     *                       watermark to the server. If `$action` is anything else,
     *                       an `Exception` will be thrown.
     * @param array $args The URL query parameters.
     * @return object The response JSON parsed using `json_decode`.
     * @throws Exception when `$action` is invalid.
     * @throws BadJSONResponse when the server responds with invalid JSON. This
     *                         might be due to an internal server error.
     */
    public function uploadRemoteFile($remote_url, $action = 'file', $args = array())
    {
        $args['file_url'] = $remote_url;
        $url = self::actionUrl($action);
        return $this->call($url, 'POST', $args);
    }
}
