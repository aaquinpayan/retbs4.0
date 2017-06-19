<?php


abstract class UsernameGenerator {
  private $user;
  
  abstract function generateUsername();


  public function getUsername($user) {
    $this->user = strtolower($user);
  
  return $this->generateUsername();
  }


  protected function getFirstName() {
    $parts = (explode(' ', $this->user, 3));
    return $parts[0];
  }

  protected function getMiddleName() {
    $parts = (explode(' ', $this->user, 3));
    return $parts[1];  
  }

  protected function getLastName() {
    $parts = (explode(' ', $this->user, 3));
    return $parts[2];  
  }


  protected function getFirstLetter($string) {
    return substr($string, 0, 1);
  }


  protected function getFirstVowel($string) {
    $position = strcspn(strtolower($string), "aeiou");
    if($position>0) return substr($string, $position, 1);
    }
  }



class UsernameGenerator1 extends UsernameGenerator {
  public function generateUsername() {
    $username = "";
  $username .= $this->getFirstLetter($this->getFirstName());
  $username .= $this->getFirstLetter($this->getMiddleName());
  $username .= $this->getLastName();
  return $username;
  }
}

$tests = array("Pez Wue Cuckow" => "pcu", "Oliver Phelps Brown" => "obo", "Alpha Beta Alpha" => "aa");

$generator = new UsernameGenerator1();
foreach($tests as $input => $expectedOutput) {
  $output = $generator->getUsername($input);
  echo sprintf("%s: %s\t", $input, $output);
}
?>