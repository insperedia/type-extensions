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

    public static function new($str)
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
        $this->string = str_replace($search, $replace, $this->string);
        return $this;
    }

    public function join() {
        $this->string = $this->string.implode('', func_get_args());
        return $this;
    }

    public function similar($string, $percent = 90) {
        similar_text(mb_strtolower($this->string, 'UTF-8'), mb_strtolower($string, 'UTF-8'), $percentOut);
        return $percentOut >= $percent;

    }

    public function htmlDecode() {
        $this->string = html_entity_decode($this->string);
        return $this;
    }
    public function stripTags() {
        $this->string = strip_tags($this->string);
        return $this;
    }
    public function firstLine($separator = "\n") {
        $array = explode($separator, $this->string);
        return (new Str($array[0]));
    }
    public function remove($str, $caseSensitive = false) {
        return $this->replace($str, '', $caseSensitive);
    }

    public function removeAfter($str, $include = true, $caseInsensitive = true) {
        $pos = stripos( $this->string, $str);
        if ($pos !== FALSE) {
            return new Str(substr($this->string, 0, $pos));
        } else {
            return new Str($this->string);
        }
    }

}