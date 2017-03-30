<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utily;

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
     * @return string
     */
    public static function formatName($name)
    {
        $text = new Text();
        return $text->_formatName($name);
    }
    
    /**
     * Format a name
     * @param string $name
     * @return string
     */
    public static function formatPersonalName($name)
    {
        $text = new Text();
        return $text->_formatPersonalName($name);
    }

    /**
     * Format a name
     * @param string $name
     * @return string
     */
    public static function formatCompanyName($name)
    {
        $text = new Text();
        return $text->_formatCompanyName($name);
    }
    
    /**
     * Format a name
     * @param string $name
     * @return string
     */
    public static function formatAddressName($name)
    {
        $text = new Text();
        return $text->_formatAddressName($name);
    }

}
