<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\View\Helper;

use Cake\View\Helper;
use Tools\Traits\TextTrait;

/**
 * CakePHP TextHelper
 * @author allan
 */
class TextHelper extends Helper
{
    use TextTrait;
    
    /**
     * Remove spaces before and/or after send data
     * @param \ArrayObject $data
     * @return \ArrayObject
     */
    public function trimArray($data)
    {
        return $this->_trimArray($data);
    }
    
    /**
     * format address name
     * @param string $name
     * @param bool $abbreviate
     */
    public function formatAddressName(&$name, $abbreviate = true)
    {
        $this->_formatAddressName($name, $abbreviate);
    }

    /**
     * format company name
     * @param string $name
     */
    public function formatCompanyName(&$name)
    {
        $this->_formatCompanyName($name);
    }

    /**
     * format a name
     * @param string $name
     */
    public function formatName(&$name)
    {
        $this->_formatName($name);
    }

    /**
     * format a personal name
     * @param string $name
     */
    public function formatPersonalName(&$name)
    {
        $this->_formatPersonalName($name);
    }

    /**
     * Format text
     * @param string $string
     */
    public function formatUcFirst(&$string)
    {
        $this->_formatUcFirst($string);
    }
    
    /**
     * Format basic string
     * @param string $string
     */
    public function formatBasic(&$string)
    {
        $this->_formatBasic($string);
    }
}
