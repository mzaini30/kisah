<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    $unique = random_string('alnum', 3); // 5 karakter random string
    $text = $text . '-' . $unique;
    if (empty($text))
    {
        return 'n-a';
    }
    return $text;
}
?>