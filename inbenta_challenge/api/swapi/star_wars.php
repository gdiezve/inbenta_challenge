<?php
  require_once __DIR__.'/../helpers/curl.php';

  class Swapi {

    const URL = 'https://inbenta-graphql-swapi-prod.herokuapp.com/api';

    public static function getCharacters() {
      $headers = array();
      $headers[] = 'Content-Type: application/json';

      $body = '{"query":"{allPeople(first: 2){people{name}}}","variables":{}}';

      $characters = Curl::get(self::URL, $headers, $body);

      $c1 = $characters['data']['allPeople']['people'][0]['name'];
      $c2 = $characters['data']['allPeople']['people'][1]['name'];

      return 'I have not found any results, but I will ask to '.$c1.' and '.$c2.'.';
    }

    public static function getFlims() {
      $headers = array();
      $headers[] = 'Content-Type: application/json';

      $body = '{"query":"{allFilms(first: 2){films{title}}}","variables":{}}';

      $characters = Curl::get(self::URL, $headers, $body);

      $f1 = $characters['data']['allFilms']['films'][0]['title'];
      $f2 = $characters['data']['allFilms']['films'][1]['title'];

      return 'So... Force, eh? Watch you must  "'.$f1.'" and "'.$f2.'", best films are they and strong the force is.';
    }
  }

?>
