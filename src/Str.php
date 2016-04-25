<?php

namespace Insperedia\Scalars;

class Str
{
    protected $string;

    public function __constructor($str)
    {
        $this->string = $str;
    }

    public static function n($str)
    {
        return new Str($str);
    }

    public function trim() {
        return trim($this->string);
    }

    public function sub($start, $length = null) {
        return substr($this->string, $start, $length);
    }

    public function find($regex) {
        preg_match($regex, $this->string, $matches);
        return $matches;
    }

    public function findAll($regex, $flags = PREG_PATTERN_ORDER) {
        preg_match_all($regex, $this->string, $matches, $flags);
        return $matches;
    }

    public function contains($str) {
        return strpos($this->string, $str) !== FALSE;
    }

    public function icontains($str) {
        return stripos($this->string, $str) !== FALSE;
    }
}