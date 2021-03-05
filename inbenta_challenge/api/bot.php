<?php

  require_once './swapi/star_wars.php';

	class Bot {

    const SP_SENTENCES = [
      'force'
    ];

    public static function isSpecialWord ($message) {
      for ($i = 0; $i < count(self::SP_SENTENCES); $i++) {
        if (stripos($message, self::SP_SENTENCES[$i])!== false){
          $message = $i;
          break;
        }
      }
      return $message;
    }

    public static function specialWord ($position) {
      return Swapi::getFlims();
    }

    public static function helperMessage() {
      return Swapi::getCharacters();
    }
  }
?>
