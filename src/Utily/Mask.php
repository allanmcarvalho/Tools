<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utily;

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
     * Formata um CPF
     * @param string $cpfNumber numero do cpf a ser formatado
     * @return string
     */
    public static function cpf($cpfNumber)
    {
        $mask = new Mask();
        return $mask->_cpf($cpfNumber);
    }
    
    /**
     * Formata um CNPJ
     * @param string $cnpjNumber numero do cnpj a ser formatado
     * @return string
     */
    public static function cnpj($cnpjNumber)
    {
        $mask = new Mask();
        return $mask->_cnpj($cnpjNumber);
    }
    
    /**
     * Formata um RG
     * @param string $rgNumber numero do rg a ser formatado 
     * @return string
     */
    public static function rg($rgNumber)
    {
        $mask = new Mask();
        return $mask->_rg($rgNumber);
    }
    
    /**
     * Foramta um numero de Telefone
     * @param string $phoneNumber numero de telefone a ser formatado
     * @return string
     */
    public static function phone($phoneNumber)
    {
        $mask = new Mask();
        return $mask->_phone($phoneNumber);
    }
    
    /**
     * Formata um CEP
     * @param string $cepNumber numero do CEP a ser formatado
     * @return string
     */
    public static function cep($cepNumber)
    {
        $mask = new Mask();
        return $mask->_cep($cepNumber);
    }
    
    /**
     * Formata uma mascara customizada
     * @param string $value
     * @param string $mask
     * @return string
     */
    public static function custom($value, $mask)
    {
        $maskClass = new Mask();
        return $maskClass->_custom($value, $mask);
    }
}
