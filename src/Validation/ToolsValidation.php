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
     * Valida um CPF
     * @param string $cpfNumber
     * @return bool
     */
    public static function cpf($cpfNumber)
    {
        return (bool) \Tools\Utily\Validate::cpf($cpfNumber);
    }
    
    /**
     * Valida um CNPJ
     * @param string $cnpjNumber
     * @return bool
     */
    public static function cnpj($cnpjNumber)
    {
        return (bool) \Tools\Utily\Validate::cnpj($cnpjNumber);
    }
    
    /**
     * Valida um RG
     * @param string $rgNumber
     * @return bool
     */
    public static function rg($rgNumber)
    {
        return (bool) \Tools\Utily\Validate::rg($rgNumber);
    }
    
    /**
     * Valida um Telefone
     * @param string $phoneNumber
     * @return bool
     */
    public static function phone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber);
    }
    
    /**
     * Valida um Telefone Fixo
     * @param string $phoneNumber
     * @return bool
     */
    public static function telephone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::TELEFONE);
    }
    
    /**
     * Valida um Telefone Celular
     * @param string $phoneNumber
     * @return bool
     */
    public static function cellphone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::CELULAR);
    }
    
    /**
     * Valida um Telefone Fixo
     * @param string $phoneNumber
     * @return bool
     */
    public static function servicePhone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::SERVICO);
    }
    
    /**
     * Valida um Telefone não regional
     * @param string $phoneNumber
     * @return bool
     */
    public static function nonRegionalPhone($phoneNumber)
    {
        return (bool) \Tools\Utily\Validate::phone($phoneNumber, \Tools\Abstracts\PhoneTypes::NAO_GEOGRAFICOS);
    }
    
    /**
     * Valida um cep
     * @param string $cepNumber
     * @return bool
     */
    public static function cep($cepNumber)
    {
        return (bool) \Tools\Utily\Validate::cep($cepNumber);
    }
    
    /**
     * Valida um usuário
     * @param string $value não permite caracteres especiais, e nem que comece com um numero
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
