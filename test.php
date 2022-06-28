<?php
  $maths[0][0] = "3";
  $maths[0][1] = "Mathematics";
  $maths[1][0] = "1";
  $maths[1][1] = "Computer Science";
  $maths[0][2] = "2";
  $maths[1][2] = "Statistics";

function program_list ( $l ) {
      $res = "<ul>\n";
      for ( $i = 0 ; $i < count($l) ; $i ++ ) {
         $id = $l[$i][0];
        $text = $l[$i][1];
         $res = $res . " <li> <a href=math.php?id=$id>$text</a>\n";
      }
      $res = $res . "</ul>";
      return $res;
}

echo program_list($maths);


 ?>

