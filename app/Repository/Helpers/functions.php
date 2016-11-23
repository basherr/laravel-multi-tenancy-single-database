<?php
/**
 * Create slugs of the text
 *
 * @param text
 * @return slug
 */
if(!function_exists('slugify'))
{
  function slugify($text)
  {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
  }
  /**
   * Get by key and value
   *
   * @param null
   * @return null
   */
  function get_key_value_pair( $data )
  {
    $meta_data = [];
    foreach($data as $d)
    {
      $meta_data[$d['meta_key']]  = $d['meta_value'];
    }
    return $meta_data;
  }
}