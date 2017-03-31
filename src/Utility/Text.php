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
     */
    public static function formatName(&$name, $abbreviate = true)
    {
        $text = new Text();
        $text->_formatName($name, $abbreviate);
    }
    
    /**
     * Format a personal name
     * @param string $name
     */
    public static function formatPersonalName(&$name)
    {
        $text = new Text();
        $text->_formatPersonalName($name);
    }

    /**
     * Format a company name
     * @param string $name
     */
    public static function formatCompanyName(&$name)
    {
        $text = new Text();
        $text->_formatCompanyName($name);
    }
    
    /**
     * Format a address name
     * @param string $name
     */
    public static function formatAddressName(&$name)
    {
        $text = new Text();
        $text->_formatAddressName($name);
    }
    
    /**
     * Format text
     * @param string $string
     */
    public static function formatUcFirst(&$string)
    {
        $text = new Text();
        $text->_formatUcFirst($string);
    }
    
    /**
     * Format basic string
     * @param type $string
     */
    public static function formatBasic(&$string)
    {
        $text = new Text();
        $text->_formatBasic($string);
    }

}
