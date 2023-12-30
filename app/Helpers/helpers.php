<?php

use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format = '%A, %d %B %Y - H:i:s')
{
    return Jalalian::forge($date)->format($format);
}

function checkToken($token)
{
    $token = trim($token);
    $token = preg_replace('/[^0-9A-Za-z]/', '', $token);
    return $token;
}