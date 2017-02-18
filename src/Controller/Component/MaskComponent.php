<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Controller\Component;

use Cake\Controller\Component;
use Tools\Traits\MaskTrait;

/**
 * CakePHP MaskComponent
 * @author allan
 */
class MaskComponent extends Component
{
    use MaskTrait;
    
    public $components = ['Tools.Validate'];
    
    /**
     * Formata um CPF
     * @param string $cpfNumber numero do cpf a ser formatado
     * @return string
     */
    public function cpf($cpfNumber)
    {
        return $this->_cpf($cpfNumber);
    }
    
    /**
     * Formata um CNPJ
     * @param string $cnpjNumber numero do cnpj a ser formatado
     * @return string
     */
    public function cnpj($cnpjNumber)
    {
        return $this->_cnpj($cnpjNumber);
    }
    
    /**
     * Formata um RG
     * @param string $rgNumber numero do rg a ser formatado 
     * @return string
     */
    public function rg($rgNumber)
    {
        return $this->_rg($rgNumber);
    }
    
    /**
     * Foramta um numero de Telefone
     * @param string $phoneNumber numero de telefone a ser formatado
     * @return string
     */
    public function phone($phoneNumber)
    {
        return $this->_phone($phoneNumber);
    }
    
    /**
     * Formata um CEP
     * @param string $cepNumber numero do CEP a ser formatado
     * @return string
     */
    public function cep($cepNumber)
    {
        return $this->_cep($cepNumber);
    }
    
    /**
     * Formata uma mascara customizada
     * @param string $value
     * @param string $mask
     * @return string
     */
    public function custom($value, $mask)
    {
        return $this->_custom($value, $mask);
    }
}
