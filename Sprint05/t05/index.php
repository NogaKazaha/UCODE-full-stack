<?php
  class StrFrequency {
    function __construct($string) {
      $this->string = $string;
    }
    function letterFrequencies() {
      $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $arr = [];
      for($i = 0; $i < strlen($letters); $i++) {
        $count = 0; 
        for($j = 0; $j < strlen($this->string); $j++) {
          if(strtoupper($this->string[$j]) === $letters[$i]) {
            $count++;
          }
        }
        if($count > 0) {
          $arr[$letters[$i]] = $count;
        }
      }
      return $arr;
    }
    function wordFrequencies() {
      $string = strtoupper($this->string);
      $words = str_word_count($string, 1);
      $arr = [];
      foreach($words as $word) {
        $count = 0;
        foreach($words as $new_word) {
          if($word === $new_word) {
            $count++;
          }
        }
        $arr[$word] = $count;
      }
      return $arr;
    }
    function reverseString() {
      return strrev($this->string);
    }
  }

  function test($string) {
    $obj = new StrFrequency($string);
    $symbol = $obj->letterFrequencies();
    echo "Letters in " . $string . "\n";
    foreach ($symbol as $k => $v) {
      echo "Letter " . $k . " is repeated " . $v . " times\n";
    }
    $symbol= $obj->wordFrequencies();
    echo "Words in " . $string. "\n";
    foreach($symbol as $k => $v) {
      echo "Word ". $k . " is repeated ". $v . " times\n";
    }
    echo "Reverse the string: ". $string. "\n";
    echo $obj->reverseString() . "\n";
  }

  test("Face it, Harley-- you and your Puddin' are kaput!");
  echo "*************\n";
  test("  Test test 123 45 !0 f   HeLlO wOrLd  ");
  echo "*************\n";
  test("");
?>