<?php
namespace Publitio;

/**
 * API presents the main interface to the Publitio RESTful API.
 * You can find more documentation about Publitio at https://publit.io/docs.
 */
class API
{
    public const VERSION = '2.0.0';

    private const KNOWN_STATUS_CODES = array(400, 401, 402, 403, 404, 405, 406, 410, 429, 500, 503);

    private $key;
    private $secret;
    private $client;

    /**
     * @param string $key Your API key. You can find your API
     *                    key on your Publitio dashboard at https://publit.io/dashboard.
     * @param string $secret Your API secret. You can find your API
     *                       secret on your Publitio dashboard at https://publit.io/dashboard.
     */
    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->client = new GuzzleHttp\Client(array(
            'base_uri' => 'http://api.publit.io/v1/'
        ));
    }

    private static function getNonce()
    {
        return random_int(10000000, 99999999);
    }

    private static function getTimestamp()
    {
        return time();
    }

    private static function getKit()
    {
        return "php-" . self::VERSION;
    }

    private static function addQueryArgs($url, $args)
    {
        return $url . '?' . http_build_query($args, '', '&');
    }

    private function getSignature($timestamp, $nonce)
    {
        return sha1("$timestamp$nonce$this->secret");
    }

    /**
     * Make an API call. For a list of avaliable calls, see https://publit.io/docs.
     * Use this method when you aren't going to be uploading any files with the call.
     * If you wish to upload file, use the @ref uploadFile "uploadFile" or
     * @ref uploadRemoteFile "uploadRemoteFile" methods.
     *
     * @param string $url The API URL, for example '/files/list'.
     * @param string $method The HTTP method, for example 'GET' or 'DELETE'.
     *                       Which of these you need depends on what kind of call you are making.
     *                       The method for each API URL is documented at https://publit.io/docs.
     * @param array $args The URL query parameters.
     *
     * @return object
     *
     * @throws Exception
     */
    public function call($url, $method = 'GET', $args = array())
    {
        $timestamp = self::getTimestamp();
        $nonce = self::getNonce();
        $signature = $this->getSignature($timestamp, $nonce);
        $args['api_key'] = $this->key;
        $args['api_timestamp'] = $timestamp;
        $args['api_nonce'] = $nonce;
        $args['api_signature'] = $signature;
        $url = self::addQueryArgs($url, $args);
        
        $res = $this->client->request(method, $url);

        if (!in_array($res->getStatusCode(), self::KNOWN_STATUS_CODES)) {
            throw new Exception("Unfamiliar status code {$res->getStatusCode()}");
        }

        return json_decode($res->getBody());
    }

    /**
     * Upload a file
     *
     * @param string $file_path
     * @param string $action
     * @param array $args
     *
     * @return null|string
     *
     * @throws Exception
     */
    public function uploadFile($file, $action = 'file', $args = array())
    {
        if ($action === "file") {
            $url = self::addQueryArgs('/files/create', $args);
        } elseif ($action === "watermark") {
            $url = self::addQueryArgs('/watermarks/create', $args);
        }
    }

    // XXX Do I need the action parameter here?
    public function uploadRemoteFile($remote_url, $action = 'file', $args = array())
    {
    }
}
