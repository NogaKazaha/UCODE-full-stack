<?php
  function firstUpper($str) {
    if (!$str || $str == NULL) {
      return "";
    }
    $str = trim($str, " \n\r\t\v\0");
    $str = ucfirst(strtolower($str));
    return $str;
  }

  echo ('"testing String" : ' . firstUpper("testing String")) . "\n";
  echo ('"   testing   String" : ' . firstUpper("   testing   String")) . "\n";
  echo ('"07" : ' . firstUpper("07")) . "\n";
  echo ('"" : ') . firstUpper("") . "\n";
  echo ('true : ' . firstUpper(true)) . "\n";
  echo ('NULL : ' . firstUpper(NULL)) . "\n";

  echo (firstUpper("   ...I Will Rebuild Krypton Atop His Bones.")) . "\n";
  echo (firstUpper(" 300room FOR yoUr  DESTiny   ")) . "\n";
?>