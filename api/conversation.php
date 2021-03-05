<?php
  require_once 'inbenta/authentication.php';
  require_once 'bot.php';

  session_start();

  // If the user don't have access token or it's expired
  if (!isset($_SESSION['access_token']) || time() > $_SESSION['access_token_expiration']) {
    newAccessToken();
  }

  // If no-results count is not initialized
  if (!isset($_SESSION['no-results'])) {
    $_SESSION['no-results'] = 0;
  }

  if (!isset($_SESSION['conversation_token'])) {
    newConversationToken($_SESSION['access_token']);
  }

  // If there is a conversation session already
  if (isset($_SESSION['conversation_token'])) {
    $message = htmlentities($_POST['message']);
    // If the message contains an special word/sentence
    $is_special_word = Bot::isSpecialWord($message);

    // If don't contains a special word we talk with the bot
    if (!is_int($is_special_word)) {
      $answer = Authentication::getBotAnswer(
        $_SESSION['access_token'],
        $_SESSION['conversation_token'],
        $message
      );
      // If we got a session expired response
      if ($answer['message'] == "Session expired.") {
        newConversationToken($_SESSION['access_token']);
        echo "Your session expired, reload the page.";
      }
      // If the answer have no-result flag
      else if ($answer['no-results'] == 1) {
        $_SESSION['no-results'] += 1;
        if ($_SESSION['no-results'] == 2){
          echo Bot::helperMessage();
          $_SESSION['no-results'] = 0;
        } else {
          echo $answer['message'];
        }
      }
      // If we got a good answer
      else {
        $_SESSION['no-results'] = 0;
        echo $answer['message'];
      }
    } else {
      echo Bot::specialWord($is_special_word);
    }
  }

  function newAccessToken() {
    $authentication = Authentication::getAuthToken();
    $_SESSION['access_token'] = $authentication['accessToken'];
    $_SESSION['access_token_expiration'] = $authentication['expiration'];
  }

  function newConversationToken() {
    $_SESSION['conversation_token'] = Authentication::getConversationToken($_SESSION['access_token']);
  }


?>
