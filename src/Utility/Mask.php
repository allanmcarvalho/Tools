<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utility;

use Tools\Traits\MaskTrait;

/**
 * Description of Mask
 *
 * @author allan
 */
class Mask
{
    use MaskTrait;
    
    /**
     * Format a CPF
     * @param string $cpfNumber CPF number to be formatted
     * @return string
     */
    public static function cpf($cpfNumber)
    {
        $mask = new Mask();
        return $mask->_cpf($cpfNumber);
    }
    
    /**
     * Format a CNPJ
     * @param string $cnpjNumber CNPJ number to be formatted
     * @return string
     */
    public static function cnpj($cnpjNumber)
    {
        $mask = new Mask();
        return $mask->_cnpj($cnpjNumber);
    }
    
    /**
     * Format a RG
     * @param string $rgNumber RG number to be formatted 
     * @return string
     */
    public static function rg($rgNumber)
    {
        $mask = new Mask();
        return $mask->_rg($rgNumber);
    }
    
    /**
     * Foramt a phone number
     * @param string $phoneNumber PHONE number to be formatted
     * @return string
     */
    public static function phone($phoneNumber)
    {
        $mask = new Mask();
        return $mask->_phone($phoneNumber);
    }
    
    /**
     * Format a CEP
     * @param string $cepNumber CEP number to be formatted
     * @return string
     */
    public static function cep($cepNumber)
    {
        $mask = new Mask();
        return $mask->_cep($cepNumber);
    }
    
    /**
     * Format a custom mask
     * @param string $value
     * @param string $mask
     * @return string
     */
    public static function custom($value, $mask)
    {
        $maskClass = new Mask();
        return $maskClass->_custom($value, $mask);
    }
    
    /**
     * Remove mask special chars from string
     * @param string $string
     */
    public static function removeMask(&$string)
    {
        $maskClass = new Mask();
        $maskClass->_removeMask($string);
    }
}
