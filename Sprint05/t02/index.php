<?php
function checkDivision($start = 1, $end = 60) {
  for($i = $start; $i <= $end; $i++) {
    if($i % 2 == 0 && $i % 3 == 0 && $i % 10 == 0) {
      echo 'The number ' . $i . ' is divisible by 2, is divisible by 3, is divisible by 10' . "\n";
      continue;
    }
    else if($i % 2 == 0 && $i % 3 == 0) {
      echo 'The number ' . $i . ' is divisible by 2, is divisible by 3' . "\n";
      continue;
    }
    else if($i % 2 == 0 && $i % 10 == 0) {
      echo 'The number ' . $i . ' is divisible by 2, is divisible by 10' . "\n";
      continue;
    }
    else if($i % 3 == 0 && $i % 10 == 0) {
      echo 'The number ' . $i . ' is divisible by 3, is divisible by 10' . "\n";
      continue;
    }
    else if($i % 2 == 0) {
      echo 'The number ' . $i . ' is divisible by 2' . "\n";
      continue;
    }
    else if($i % 3 == 0) {
      echo 'The number ' . $i . ' is divisible by 3' . "\n";
      continue;
    }
    else if($i % 10 == 0) {
      echo 'The number ' . $i . ' is divisible by 10' . "\n";
      continue;
    }
    else {
      echo 'The number ' . $i . ' -' . "\n";
      continue;
    }
  }
}
  /*
  echo "*** Range is 3 - 7 checkDivision(3,7) ***\n";
  checkDivision(3, 12);
  echo "*** Range is 58 - ... checkDivision(58) ***\n";
  checkDivision(58);
  echo "*** Range is ... - ... checkDivision() ***\n";
  checkDivision();
  */
?>