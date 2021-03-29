<?php

namespace Public\inc\Class;

class VerifForm {

  /**
   * Purge les faille XSS
   *
   * @param string $notClean
   * @return string
   */
  public function cleanXSS($notClean)
  {
      return trim(strip_tags($notClean));
  }

  /**
   * Vérifie la longueur d'un texte
   *
   * @param array $errors
   * @param string $notVerif
   * @param integer $min
   * @param integer $max
   * @param string $key
   * @return void
   */
  public function verifText($errors, $notVerif, int $min, int $max, $key)
  {
    if(!empty($notVerif)){
      if (mb_strlen($notVerif) < $min) {
        $errors[$key] = 'Veuillez renseigner au minimum '. $min .' caractères';
      } elseif (mb_strlen($notVerif) > $max) {
          $errors[$key] = 'Veuillez renseigner au maximum '. $max .' caractères';
        }
    } else {
      $errors[$key] = 'Veuillez renseigner ce champ';
    }
    return $errors;
  }

  /**
   * Verifie la validité d'une email
   *
   * @param string $notClean
   * @return void
   */
  public function verifEmail($notClean)
  {
    if(filter_var($notClean, FILTER_VALIDATE_EMAIL)){
      return true;
    } else {
      return false;
    }
  }

  /**
   * Valide les deux password
   *
   * @param string $password
   * @param string $confirmPassword
   * @param array $errors
   * @param string $keyPassword
   * @param string $keyConfirmPassword
   * @param integer $min
   * @return void
   */
  public function validatePassword($password, $confirmPassword, $errors, $keyPassword, $keyConfirmPassword, int $min)
  {
    if (!empty($password) && !empty($confirmPassword)) {
      if (mb_strlen($password) < $min) {
        $errors[$keyPassword] = 'Veuillez renseigner au minimum '. $min .' caractères';
      } elseif ($confirmPassword != $password) {
        $errors[$keyPassword] = 'Les mots de passe ne correspondent pas';
      }
    } else {
      $errors[$keyPassword] = 'Veuillez renseigner ce/ces champs';
    }
  
    return $errors;
  }

  /**
   * Check si la valeurs des bouton radio n'as pas été modifié par l'utilisateur
   *
   * @param string $gender
   * @param array $errors
   * @param string $key
   * @return void
   */
  public function checkGender(string $gender, $errors, string $key)
  {
    if($gender !== 'homme' && $gender !== 'femme' && $gender !== 'autre'){
      $errors[$key] = 'Erreur lors du choix du genre';
    }
    return $errors;
  }

  public function isNumber($isNaN)
  {
    return is_numeric($isNaN);
  }

}
