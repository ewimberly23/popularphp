<?php

namespace app\resources;

use app\helpers\Util;

/**
 * GitHub defines methods for retrieving resources
 *
 * @author Evan Wimberly <ewimberly23@gmail.com>
 */
class GitHub 
{
    /**
     * @var resource $ch
     */
    private $ch;

    /**
     * Initialize resource
     * @param string $url (optional)
     */
    function __construct(string $url) {
        if (! $this->validateURL($url)) {
            throw new \Exception("UNEXPECTED URL");
        }

        $this->ch = curl_init($url);

        if (($errMsg = $this->setHeadersFor($this->ch)) !== null) {
            throw new \Exception($errMsg);
        }
    }

    /**
     * Confirms the urls domain and protocol
     * @param string $url
     * @return bool
     */
    private function validateURL(string $url) {
        $components = explode('//', $url);
        if ($components[0] !== 'https:') { return false; }
        if (! preg_match('/^api.github.com\//', $components[1], $match)) { return false; }
        return true;
    }

    /**
     * Set required headers
     * @param resource $resource
     * @return string || null
     */
    private function setHeadersFor($resource) {
        if (! curl_setopt($resource, CURLOPT_RETURNTRANSFER, true)) {
            return "FAILED TO SETOPT: CURLOPT_RETURNTRANSFER";
        }
        if (! curl_setopt($resource, CURLOPT_HTTPHEADER, [
            'User-Agent:ewimberly23',
            'Content-Type:application/json',
        ])) {
            return "FAILED TO SETOPT: CURLOPT_HTTPHEADER";
        }
        return null;
    }

    /**
     * Fetch data
     * @return object
     */
    private function fetchData() {
        $json_obj = json_decode(curl_exec($this->ch));
        if (json_last_error() != JSON_ERROR_NONE) {
            return [];
        }
        return $json_obj;
    }

    /**
     * Fetches the data and return each row
     * @return Generator
     */
    public function fetchRow() {
        $json = $this->fetchData();
        if (! property_exists($json, 'items')) { return; }

        while(list($key, $rec) = each($json->items)) {
            yield $key => $rec;
        }
    }
}
