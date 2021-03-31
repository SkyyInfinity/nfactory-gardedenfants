<?php
// D E B U G ///////////////////////////////////////////////////////////////////
function debug($array) {
	echo '<pre style="height:150px;overflow-y: scroll;font-size:.8em;padding: 10px; font-family: Consolas, Monospace; background-color: #000; color: #fff;">';
	print_r($array);
	echo '</pre>';
}
// R E D I R E C T I O N ///////////////////////////////////////////////////////
function redirect($page) {
  header("Location: $page");
}
// R E D I R E C T I O N   T E M P O ///////////////////////////////////////////
function redirectTempo($value, $page) {
  header("refresh:$value;url=$page");
}
// P A G I N A T I O N /////////////////////////////////////////////////////////
function pagination($id, $page, $num, $count) {
  ?><ul><?php
    if($page > 1) {
      ?><li class="pagination"><a class="back-to-home" href="single.php?id=<?php echo $id ?>&page=<?php echo $page - 1; ?>">Précedent</a></li><?php
    }
    if($page * $num < $count) {
      ?><li class="pagination"><a class="back-to-home" href="single.php?id=<?php echo $id ?>&page=<?php echo $page + 1; ?>">Suivant</a></li><?php
    }
  ?></ul><?php
}
// C L E A N   X S S /////////////////////////////////////////////////////////////////
function cleanXss($element) {
  return trim(strip_tags($element));
}
// V A L I D A T I O N   T E X T /////////////////////////////////////////////////////
function validationText($errors, $data, $key, $min, $max) {
  if(!empty($data)) {
    if(mb_strlen($data) < $min) {
      $errors[$key] = 'Le champ doit être plus grand que ' . $min . ' caractères.';
    } elseif(mb_strlen($data) > $max) {
      $errors[$key] = 'Le champ doit être plus petit que ' . $max . ' caractères.';
    }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
  return $errors;
}
// V A L I D A T I O N   E M A I L ///////////////////////////////////////////////////
function validationEmail($errors, $data, $key) {
  if(!empty($data)) {
    if(!filter_var($data, FILTER_VALIDATE_EMAIL)) {
      $errors[$key] = 'L\'email doit être un email valide.';
    }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
  return $errors;
}
// V A L I D A T I O N   P A S S W O R D /////////////////////////////////////////////
function validationPassword($errors, $data, $data2, $key, $min, $max) {
  $majuscule        = preg_match('@[A-Z]@', $data);
  $minuscule        = preg_match('@[a-z]@', $data);
  $chiffre          = preg_match('@[0-9]@', $data);
  $caractereSpecial = preg_match('@[^\w]@', $data);

  if(!empty($data) && !empty($data2)) {
    if($data == $data2) {
        if(mb_strlen($data) < $min) {
          $errors[$key] = 'Le mot de passe doit être plus grand que ' . $min . ' caractères.';
        } elseif(mb_strlen($data) > $max) {
          $errors[$key] = 'Le mot de passe doit être plus petit que ' . $max . ' caractères.';
        } elseif(!$majuscule || !$minuscule || !$chiffre || !$caractereSpecial) {
          $errors[$key] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractére spécial.';
        }
    } else {
        $errors[$key] = 'Les deux mot de passe doivent être identiques.';
    }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
  return $errors;
}
// V A L I D A T I O N   N U M B E R /////////////////////////////////////////////////
function validationNumber($errors, $data, $key, $min, $max) {
  if($data <= 1 || $data <= 1) {
    $an = 'an';
  } else {
    $an = 'ans';
  }
  if(!empty($data)) {
    if(!is_numeric($data)) {
        $errors[$key] = "L'âge doit être un écrit en chiffre.";
    }
    if($data < $min) {
      $errors[$key] = "L'âge doit être superieur à $min $an.";
    }
    if($data > $max) {
      $errors[$key] = "L'âge doit être inférieur à $max $an.";
    }
  } else {
      $errors[$key] = "Veuillez renseigner ce champ.";
  }
  return $errors;
}
// G E N E R A T E   R A N D O M   S T R I N G ///////////////////////////////////////
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// F O R M A T A G E   D A T E ///////////////////////////////////////////////////////
function formatDate($dateValue) {
  return date('d/m/Y H:i', strtotime($dateValue));
}
// F O R M A T A G E   D A T E   W H I T H O U T   M I N U T E ///////////////////////
function formatDateWithoutMinute($dateValue) {
  return date('d/m/Y', strtotime($dateValue));
}
// I S   L O G G E D /////////////////////////////////////////////////////////////////
function isLogged(){
  if(!empty($_SESSION['user'])) {
    if(!empty($_SESSION['user']->id) && is_numeric($_SESSION['user']->id)) {
      if(!empty($_SESSION['user']->name)) {
        if(!empty($_SESSION['user']->surname)) {
          if(!empty($_SESSION['user']->role)) {
            if(in_array('user', $_SESSION['user']->role) || in_array('admin', $_SESSION['user']->role)) {
              return true;
            }
          }
        }
      }
    }
  }
  return false;
}
// L O G O U T ///////////////////////////////////////////////////////////////////////
function logout($page) {
    session_start();
    $_SESSION['user'] = [];
    session_destroy();
    header('Location: ' . $page);
}
// S H O W   J S O N /////////////////////////////////////////////////////////////////
function showJson($data) {
  header("Content-type: application/json");
  $json = json_encode($data, JSON_PRETTY_PRINT);
  if($json) {
    die($json);
  } else {
    die('Error in json encoding');
  }
}
function getUserIpAddr(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      //ip from share internet
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      //ip pass from proxy
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else {
      $ip = '91.167.218.202';
  }
  return $ip;
}

// H E L L O   T I M E /////////////////////////////////////////////////////////////
function helloTime() {
  $hour = date('H');
  if($hour >= 18) {
    $hello = 'Bonsoir';
  } else {
      $hello = 'Bonjour';
  }
  return $hello;
}