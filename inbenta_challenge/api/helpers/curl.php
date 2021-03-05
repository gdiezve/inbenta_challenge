<?php

  class Curl {

    static function get($url, $headers, $body) {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      
      $result = curl_exec($ch);
      if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);

      return json_decode($result, true);
    }

    static function post($url, $headers, $body = "") {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 0);
      $response = curl_exec($ch);
      curl_close ($ch);

      return json_decode($response, true);
    }
  }

?>
