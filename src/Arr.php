<?php
/**
 * Date: 25.04.2016
 * Time: 15:58
 */

namespace Insperedia\Scalars;

class Arr
{
    protected $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public static function n($array)
    {
        return new Arr($array);
    }
}