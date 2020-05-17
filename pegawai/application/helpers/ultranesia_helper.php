<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('Rupiah')) {
    function Rupiah($nil = 0)
    {
        $nil = $nil + 0;
        if (($nil * 100) % 100 == 0) {
            $nil = $nil . ".00";
        } elseif (($nil * 100) % 10 == 0) {
            $nil = $nil . "0";
        }
        $nil = str_replace('.', ',', $nil);
        $str1 = $nil;
        $str2 = "";
        $dot = "";
        $str = strrev($str1);
        $arr = str_split($str, 3);
        $i = 0;
        foreach ($arr as $str) {
            $str2 = $str2 . $dot . $str;
            if (strlen($str) == 3 and $i > 0) $dot = '.';
            $i++;
        }
        $rp = strrev($str2);
        if ($rp != "" and $rp > 0) {
            return "Rp. $rp";
        } else {
            return "Rp. 0,00";
        }
    }
}

if (!function_exists('Rupiah2')) {
    function Rupiah2($nil = 0)
    {
        $nil = $nil + 0;
        if (($nil * 100) % 100 == 0) {
            $nil = $nil . ".00";
        } elseif (($nil * 100) % 10 == 0) {
            $nil = $nil . "0";
        }
        $nil = str_replace('.', ',', $nil);
        $str1 = $nil;
        $str2 = "";
        $dot = "";
        $str = strrev($str1);
        $arr = str_split($str, 3);
        $i = 0;
        foreach ($arr as $str) {
            $str2 = $str2 . $dot . $str;
            if (strlen($str) == 3 and $i > 0) $dot = '.';
            $i++;
        }
        $rp = strrev($str2);
        if ($rp != "" and $rp > 0) {
            return "Rp.$rp";
        } else {
            return "-";
        }
    }
}

if (!function_exists('Rupiah3')) {
    function Rupiah3($nil = 0)
    {
        $nil = $nil + 0;
        if (($nil * 100) % 100 == 0) {
            $nil = $nil . ".00";
        } elseif (($nil * 100) % 10 == 0) {
            $nil = $nil . "0";
        }
        $nil = str_replace('.', ',', $nil);
        $str1 = $nil;
        $str2 = "";
        $dot = "";
        $str = strrev($str1);
        $arr = str_split($str, 3);
        $i = 0;
        foreach ($arr as $str) {
            $str2 = $str2 . $dot . $str;
            if (strlen($str) == 3 and $i > 0) $dot = '.';
            $i++;
        }
        $rp = strrev($str2);
        if ($rp != 0) {
            return "$rp";
        } else {
            return "-";
        }
    }
}

if (!function_exists('to_rupiah')) {
    function to_rupiah($inp = '')
    {
        $outp = str_replace('.', '', $inp);
        $outp = str_replace(',', '.', $outp);
        return $outp;
    }
}

if (!function_exists('daftar_goldar')){
    function daftar_goldar(){
        return array(
            "A", "B", "AB", "O"
        );
    }
}

if (!function_exists('daftar_agama')){
    function daftar_agama(){
        return array(
            strtoupper("Islam"), 
            strtoupper("Kristen"), 
            strtoupper("Katholik"), 
            strtoupper("Hindu"),
            strtoupper("Budha"),
            strtoupper("Konghuchu"),
            strtoupper("Kepercayaan Lain"),
        );
    }
}
