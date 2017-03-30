<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utility;

use Tools\Traits\TextTrait;

/**
 * Description of Table
 *
 * @author allan
 */
class Text
{
    use TextTrait;
    
    /**
     * Format a name
     * @param string $name
     * @param bool $abbreviate
     * @return string
     */
    public static function formatName($name, $abbreviate = true)
    {
        $text = new Text();
        return $text->_formatName($name, $abbreviate);
    }
    
    /**
     * Format a personal name
     * @param string $name
     * @return string
     */
    public static function formatPersonalName($name)
    {
        $text = new Text();
        return $text->_formatPersonalName($name);
    }

    /**
     * Format a company name
     * @param string $name
     * @return string
     */
    public static function formatCompanyName($name)
    {
        $text = new Text();
        return $text->_formatCompanyName($name);
    }
    
    /**
     * Format a address name
     * @param string $name
     * @return string
     */
    public static function formatAddressName($name)
    {
        $text = new Text();
        return $text->_formatAddressName($name);
    }
    
    /**
     * Format text
     * @param string $string
     * @return string
     */
    public static function formatUcFirst($string)
    {
        $text = new Text();
        return $text->_formatUcFirst($string);
    }
    
    /**
     * Format basic string
     * @param type $string
     * @return type
     */
    public static function formatBasic($string)
    {
        $text = new Text();
        return $text->_formatBasic($string);
    }

}
