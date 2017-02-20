<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utily;

use Tools\Traits\ValidateTrait;
/**
 * Description of Validation
 *
 * @author allan
 */
class Validate
{
    use ValidateTrait;
    
    /**
     * Validate a CPF
     * @param string $cpfNumber Number with or without mask containing 11 digits
     * @return bool
     */
    public static function cpf($cpfNumber)
    {
        $validate = new Validate();
        return $validate->_cpf($cpfNumber);
    }
    
    /**
     * Validate a CNPJ
     * @param string $cnpjNumber Number with or without mask containing 14 digits
     * @return bool
     */
    public static function cnpj($cnpjNumber)
    {
        $validate = new Validate();
        return $validate->_cnpj($cnpjNumber);
    }
    
    /**
     * Validate a RG
     * @param string $rgNumber Number with or without mask containing 8 to 11 digits
     * @return bool
     */
    public static function rg($rgNumber)
    {
        $validate = new Validate();
        return $validate->_rg($rgNumber);
    }
    
    /**
     * Validate a phone
     * @param string $phoneNumber
     * @param \Tools\Abstracts\PhoneTypes $type
     * @return bool
     */
    public static function phone($phoneNumber, $type = 0)
    {
        $validate = new Validate();
        return $validate->_phone($phoneNumber, $type);
    }
    
    /**
     * Validate a cep
     * @param string $cepNumber Number with or without mask containing 8 digits
     * @return bool
     */
    public static function cep($cepNumber)
    {
        $validate = new Validate();
        return $validate->_cep($cepNumber);
    }
}
