<?php
class crypty {


   public static function website_protocol() {
      return (isset($_SERVER['HTTPS']) && (!empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http');
   }


   public static function website_url() {
      return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
   }


   public static function website_current() {
      return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   }


   public static function algorithm_slug($string) {
      $slug = strtolower($string);
      $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
      return trim($slug, '-');
   }


   public static function algorithm_name($string) {
      $name = strtolower($string);
      $name = preg_replace('/[^a-z0-9\.\,\s]+/', ' ', $name);
      return trim($name, ' ');
   }


   public static function string_algorithms() {
      $functions = array(
         "base64_encode",
         "base64_decode",
         "urlencode",
         "urldecode",
         "hex2bin",
         "bin2hex",
         "htmlentities",
         "html_entity_decode",
         "htmlspecialchars",
         "htmlspecialchars_decode",
         "str_rot13",
         "strrev",
         "strtolower",
         "strtoupper",
         "ucfirst",
         "ucwords"
      );
      $algorithms = array();
      foreach ( $functions as $function ) {
         if ( function_exists($function) ) {
            $algorithm              = array();
            $algorithm['slug']      = self::algorithm_slug($function);
            $algorithm['name']      = self::algorithm_name($function);
            $algorithm['url']       = self::website_url() . 'algorithm/' . $algorithm['slug'];
            $algorithm['algorithm'] = $function;
            $algorithm['type']      = 'string';
            $algorithms[] = $algorithm;
         }
      }
      return (!empty($algorithms) ? $algorithms : false);
   }


   public static function hash_algorithms() {
      $algorithms = array();
      if ( function_exists('hash') && function_exists('hash_algos') ) {
         foreach ( hash_algos() as $algo ) {
            $algorithm              = array();
            $algorithm['slug']      = self::algorithm_slug($algo);
            $algorithm['name']      = self::algorithm_name($algo);
            $algorithm['url']       = self::website_url() . 'algorithm/' . $algorithm['slug'];
            $algorithm['algorithm'] = $algo;
            $algorithm['type']      = 'hash';
            $algorithms[] = $algorithm;
         }
      }
      return (!empty($algorithms) ? $algorithms : false);
   }


   public static function all_algorithms() {
      $hash   = self::hash_algorithms();
      $string = self::string_algorithms();
      return ($hash && $string ? array_merge($hash, $string) : ($hash ? $hash : $string));
   }


   public static function slug_to_algorithm($slug) {
      $algorithms = self::all_algorithms();
      foreach ( $algorithms as $algorithm ) {
         if ( $algorithm['slug'] == $slug ) {
            return $algorithm;
            break;
         }
      }
      return false;
   }


   public static function use_algorithm($algorithm, $opts) {
      if ( !isset($opts['string']) || empty($opts['string']) ) {
         return 'the string input is empty, please provide a string.';
      }
      else if ( $algorithm['type'] == 'string' ) {
         return $algorithm['algorithm']($opts['string']);
      }
      else if ( isset($opts['string']) && isset($opts['salt']) ) {
         return hash($algorithm['algorithm'], $opts['string'] . $opts['salt']);
      }
      else {
         return hash($algorithm['algorithm'], $opts['string']);
      }
   }


}
?>