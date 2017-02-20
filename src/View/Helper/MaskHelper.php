<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\View\Helper;

use Cake\View\Helper;
use Tools\Traits\MaskTrait;

/**
 * CakePHP MaskHelper
 * @author allan
 */
class MaskHelper extends Helper
{
    use MaskTrait;
    
    public $helpers = [
        'Tools.Validate'
    ];
    
    /**
     * Format a CPF
     * @param string $cpfNumber
     * @return string
     */
    public function cpf($cpfNumber)
    {
        return $this->_cpf($cpfNumber);
    }
    
    /**
     * Format a CNPJ
     * @param string $cnpjNumber
     * @return string
     */
    public function cnpj($cnpjNumber)
    {
        return $this->_cnpj($cnpjNumber);
    }
    
    /**
     * Format a RG
     * @param string $rgNumber
     * @return string
     */
    public function rg($rgNumber)
    {
        return $this->_rg($rgNumber);
    }
    
    /**
     * Format a phone number
     * @param string $phoneNumber
     * @return string
     */
    public function phone($phoneNumber)
    {
        return $this->_phone($phoneNumber);
    }
    
    /**
     * Format a CEP
     * @param string $cepNumber
     * @return string
     */
    public function cep($cepNumber)
    {
        return $this->_cep($cepNumber);
    }
    
    /**
     * Format a custom mask
     * @param string $value
     * @param string $mask
     * @return string
     */
    public function custom($value, $mask)
    {
        return $this->_custom($value, $mask);
    }
}
