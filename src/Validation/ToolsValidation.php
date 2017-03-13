<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Validation;

/**
 * Description of ToolsValidation
 *
 * @author allan
 */
class ToolsValidation
{
    /**
     * Validate a CPF
     * @param string $cpfNumber
     * @return bool
     */
    public static function cpf($cpfNumber)
    {
        return (bool) \Tools\Utily\Validate::cpf($cpfNumber);
    }
    
    /**
     * Validate a CNPJ
     * @param string $cnpjNumber
     * @return bool
     */
    public static function cnpj($cnpjNumber)
    {
        return (bool) \Tools\Utily\Validate::cnpj($cnpjNumber);
    }
    
    /**
     * Validate a RG
     * @param string $rgNumber
     * @return bool
     */
    public static function rg($rgNumber)
    {
        return (bool) \Tools\Utily\Validate::rg($rgNumber);
    }
    
    /**
     * Validate a Phone
     * @param string $phoneNumber
     * @return bool
     */
    public static function phone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber);
    }
    
    /**
     * Validate a Telephone
     * @param string $phoneNumber
     * @return bool
     */
    public static function telephone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::TELEPHONE);
    }
    
    /**
     * Validate a Cellphone
     * @param string $phoneNumber
     * @return bool
     */
    public static function cellphone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::CELLPHONE);
    }
    
    /**
     * Validate a Service phone
     * @param string $phoneNumber
     * @return bool
     */
    public static function servicePhone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::SERVICE);
    }
    
    /**
     * Validate a Non Regional Phone
     * @param string $phoneNumber
     * @return bool
     */
    public static function nonRegionalPhone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::NON_REGIONAL);
    }
    
    /**
     * Validate a cep
     * @param string $cepNumber
     * @return bool
     */
    public static function cep($cepNumber)
    {
        return (bool) \Tools\Utily\Validate::cep($cepNumber);
    }
    
    /**
     * Check if birthdate is great than minimum
     * @param \Cake\I18n\Time $birthdate
     * @param int $minimumAge
     * @return bool
     */
    public static function minimumAge(\Cake\I18n\Time $birthdate, $minimumAge)
    {
        $minimumBirthdate = new \Cake\I18n\Time();
        $minimumBirthdate->modify("- $minimumAge years");
        return $birthdate > $minimumBirthdate ? false : true;
    }

    /**
     * Validate a username
     * @param string $value Does not allow special characters, nor does it start with a number
     * @return bool
     */
    public static function username($value)
    {
        return (bool) preg_match('/^'
                . '(?=.{6,20}$)' //Tamanho minimo e maximo
                . '(?![_.]|[0-9])' //Não pode no começo
                . '(?!.*[_.]{2})' // Não pode dentro
                . '[a-zA-Z0-9._]+' // Caracteres permitidos
                . '(?<![_.])' // Não pode no final
                . '$/', $value);
    }
}
