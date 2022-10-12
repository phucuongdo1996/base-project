<?php

if (! function_exists('convertDate')) {
    function convertDate($strDate, $format = 'Y-m-d')
    {
        return date($format, strtotime($strDate));
    }
}
