<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('dateFormat'))
{
    function dateFormat($format='d-m-Y', $givenDate=null)
    {
        return date($format, strtotime($givenDate));
    }
}