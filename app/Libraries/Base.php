<?php
namespace Libraries;

class Base 
{
    public function curl($url)
    {
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // grab URL and pass it to the browser
        $return = curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);
        return $return;
    }
}
