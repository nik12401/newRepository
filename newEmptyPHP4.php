?php

   define('LOWERCASE',3);

   define('UPPERCASE',1);

   function detect_cyr_charset($str) {

      $charsets = Array(

         'k' => 0,

         'w' => 0,

         'd' => 0,

         'i' => 0,

         'm' => 0

      );

      for ( $i = 0, $length = strlen($str); $i < $length; $i++ ) {

         $char = ord($str[$i]);

      //non-russian characters

      if ($char < 128 || $char > 256) continue;

      //CP866

      if (($char > 159 && $char < 176) || ($char > 223 && $char < 242))

         $charsets['d']+=LOWERCASE;

      if (($char > 127 && $char < 160)) $charsets['d']+=UPPERCASE;

      //KOI8-R

      if (($char > 191 && $char < 223)) $charsets['k']+=LOWERCASE;

      if (($char > 222 && $char < 256)) $charsets['k']+=UPPERCASE;

      //WIN-1251

      if ($char > 223 && $char < 256) $charsets['w']+=LOWERCASE;

      if ($char > 191 && $char < 224) $charsets['w']+=UPPERCASE;

      //MAC

      if ($char > 221 && $char < 255) $charsets['m']+=LOWERCASE;

      if ($char > 127 && $char < 160) $charsets['m']+=UPPERCASE;

      //ISO-8859-5

      if ($char > 207 && $char < 240) $charsets['i']+=LOWERCASE;

      if ($char > 175 && $char < 208) $charsets['i']+=UPPERCASE;

   }

   arsort($charsets);

   return key($charsets);

}

?>