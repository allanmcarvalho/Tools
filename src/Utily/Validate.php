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
     * Valida um CPF
     * @param string $cpfNumber numero com ou sem mascara contendo 11 dígitos
     * @return bool
     */
    public static function cpf($cpfNumber)
    {
        $validate = new Validate();
        return $validate->_cpf($cpfNumber);
    }
    
    /**
     * Valida um CNPJ
     * @param string $cnpjNumber numero com ou sem mascara contendo 14 dígitos
     * @return bool
     */
    public static function cnpj($cnpjNumber)
    {
        $validate = new Validate();
        return $validate->_cnpj($cnpjNumber);
    }
    
    /**
     * Valida um RG
     * @param string $rgNumber numero com ou sem mascara contendo de 8 a 10 dígitos
     * @return bool
     */
    public static function rg($rgNumber)
    {
        $validate = new Validate();
        return $validate->_rg($rgNumber);
    }
    
    /**
     * Valida um telefone
     * @param string $phoneNumber numero de telefone. Tamanho varia de acordo com o tipo
     * @param \Tools\Abstracts\PhoneTypes $type
     * @return bool
     */
    public static function phone($phoneNumber, $type = 0)
    {
        $validate = new Validate();
        return $validate->_phone($phoneNumber, $type);
    }
    
    /**
     * Valida um cep
     * @param string $cepNumber numero do cep contendo 8 dígitos
     * @return bool
     */
    public static function cep($cepNumber)
    {
        $validate = new Validate();
        return $validate->_cep($cepNumber);
    }
}
