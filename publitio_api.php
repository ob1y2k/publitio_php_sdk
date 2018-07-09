<?php
    /*
     * -----------------------------------------------------------------------------
     * PHP SDK for Publitio API
     *
     * Author:      Divjak V.
     * Copyright:   (c) Publitio https://publit.io/
     * Version:     1.0
     *
     *-----------------------------------------------------------------------------
     */

    /**
     * Class PublitioAPI
     */
    class PublitioAPI {
        /**
         * @var string $_version
         */
        private $_version = '1.0';

        /**
         * @var string $_url
         */
        private $_url = 'http://api.publit.io/v1';

        /**
         * @var string $_library
         */
        private $_library;

        /**
         * @var string $_key
         * @var string $_secret
         */
        private $_key, $_secret;

        /**
         * PublitioAPI constructor.
         *
         * @param string $key
         * @param string $secret
         */
        public function __construct(string $key, string $secret)
        {
            $this->_key = $key;
            $this->_secret = $secret;

            // Determine which HTTP library to use:
            // check for cURL, else fall back to file_get_contents
            if (function_exists('curl_init')) {
                $this->_library = 'curl';
            } else {
                $this->_library = 'fopen';
            }
        }

        /**
         * @return string
         */
        public function version(): string
        {
            return $this->_version;
        }

        /**
         * Encode URL.
         *
         * RFC 3986 complient rawurlencode()
         * Only required for phpversion() <= 5.2.7RC1
         * @see http://www.php.net/manual/en/function.rawurlencode.php#86506
         *
         * @param mixed $input
         *
         * @return array|string
         */
        private function _urlencode($input)
        {
            if (is_array($input)) {
                return array_map(array('_urlencode'), $input);
            }

            if (is_scalar($input)) {
                return str_replace(array('%7E', '+'), array('~', ' '), rawurlencode($input));
            }

            return '';
        }

        /**
         * Sign API call arguments
         *
         * @param $args
         *
         * @return string
         */
        private function _sign(array $args): string
        {
            ksort($args);
            $sbs = '';
            foreach ($args as $key => $value) {
                if ($sbs !== '') {
                    $sbs .= '&';
                }
                // Construct Signature Base String
                $sbs .= $this->_urlencode($key) . '=' . $this->_urlencode($value);
            }

            // Add shared secret to the Signature Base String and generate the signature
            return sha1($sbs . $this->_secret);
        }

        /**
         * Add required api_* arguments
         *
         * @param $args
         *
         * @return array
         *
         * @throws Exception
         */
        private function _args(array $args): array
        {
            $args['api_nonce'] = str_pad(random_int(0, 99999999), 8, STR_PAD_LEFT);
            $args['api_timestamp'] = time();
            $args['api_key'] = $this->_key;

            if (!array_key_exists('api_format', $args)) {
                // Use the serialised PHP format,
                // otherwise use format specified in the call() args.
                $args['api_format'] = 'php';
            }

            // Add API kit version
            $args['api_kit'] = 'php-' . $this->_version;

            // Sign the array of arguments
            //$args['api_signature'] = $this->_sign($args);
            $args['api_signature'] = sha1($args['api_timestamp'].$args['api_nonce'].$this->_secret);

            return $args;
        }

        /**
         * Construct call URL
         *
         * @param string $call
         * @param array $args
         *
         * @return string
         *
         * @throws Exception
         */
        public function call_url(string $call, array $args = []): string
        {
            $url = $this->_url . $call . '?' . http_build_query($this->_args($args), '', '&');
            return $url;
        }

        /**
         * Make an API call
         *
         * @param string $call
         * @param string $method
         * @param array $args
         *
         * @return bool|string
         *
         * @throws Exception
         */
        public function call(string $call, string $method = 'GET', array $args = [])
        {
            $url = $this->call_url($call, $args);

            $response = null;
            if ($this->_library === 'curl') {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                if ($method === 'PUT') {
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                } else if ($method === 'DELETE') {
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                } else if ($method === 'POST') {
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
                }
                curl_setopt($curl, CURLOPT_URL, $url);
                $response = curl_exec($curl);
                curl_close($curl);
            } else if ($method === 'GET') {
                $response = file_get_contents($url);
            } else {
                $response = 'Error: No cURL library';
            }

            $unserialized_response = @unserialize($response);

            return $unserialized_response ?: $response;
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
        public function upload_file(string $file_path, string $action = 'file', array $args = []): ?string
        {

            if ($action === 'file') {
                $url = $this->call_url('/files/create', $args);
            }
            else if ($action === 'watermark') {
                $url = $this->call_url('/watermarks/create', $args);
            }

            // A new variable included with curl in PHP 5.5 - CURLOPT_SAFE_UPLOAD - prevents the
            // '@' modifier from working for security reasons (in PHP 5.6, the default value is true)
            // http://stackoverflow.com/a/25934129
            // http://php.net/manual/en/migration56.changed-functions.php
            // http://comments.gmane.org/gmane.comp.php.devel/87521
            if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50500) {
              $post_data = array('file' => '@' . $file_path);
            } else {
              $post_data = array('file' => new \CURLFile($file_path));
            }
            $response = null;

            $i = $this->_library;
            if ($i === 'curl') {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                $response = curl_exec($curl);
                $err_no = curl_errno($curl);
                $err_msg = curl_error($curl);
                curl_close($curl);
            } else {
                $response = 'Error: No cURL library';
            }

            if ($err_no === 0) {
                return $response;
            }

            return 'Error #' . $err_no . ': ' . ($err_msg ?? '');
        }
    }

