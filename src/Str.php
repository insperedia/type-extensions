<?php

namespace Insperedia\Scalars;

class Str
{
    protected $string;

    public function __construct($str)
    {
        $this->string = $str;
    }

    public function __toString()
    {
       return $this->string;
    }

    public static function n($str)
    {
        return new Str($str);
    }

    public function trim() {
        $this->string = trim($this->string);
        return $this;
    }

    public function sub($start, $length = null) {
        $this->string = substr($this->string, $start, $length);
        return $this;
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

    public function words() {
        $words = explode(' ', $this->string);
        $words = array_filter($words);
        return \SplFixedArray::fromArray($words);
    }

    public function split($separator = ' ') {
        return  explode($separator, $this->string);
    }

    public function urlencode() {
        $this->string = urlencode($this->string);
        return $this;
    }

    public function replace($search = "\n", $replace= " ") {
        $this->string = str_replace($this->string, $search, $replace);
        return $this;
    }

    public function join() {
        $this->string = $this->string.implode('', func_get_args());
        return $this;
    }

    public function similar($string, $percent = 90) {
        similar_text($this->string, $string, $percentOut);
        return $percentOut >= $percent;

    }
}