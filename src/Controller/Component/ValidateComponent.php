<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Controller\Component;

use Cake\Controller\Component;
use Tools\Traits\ValidateTrait;

/**
 * CakePHP ValidateComponent
 * @author allan
 */
class ValidateComponent extends Component
{
    use ValidateTrait;
    
    /**
     * Valida um CPF
     * @param string $cpfNumber numero com ou sem mascara contendo 11 dígitos
     * @return bool
     */
    public function cpf($cpfNumber)
    {
        return $this->_cpf($cpfNumber);
    }
    
    /**
     * Valida um CNPJ
     * @param string $cnpjNumber numero com ou sem mascara contendo 14 dígitos
     * @return bool
     */
    public function cnpj($cnpjNumber)
    {
        return $this->_cnpj($cnpjNumber);
    }
    
    /**
     * Valida um RG
     * @param string $rgNumber numero com ou sem mascara contendo de 8 a 10 dígitos
     * @return bool
     */
    public function rg($rgNumber)
    {
        return $this->_rg($rgNumber);
    }
    
    /**
     * Valida um telefone
     * @param string $phoneNumber numero de telefone. Tamanho varia de acordo com o tipo
     * @param \Tools\Abstracts\PhoneTypes $type
     * @return bool
     */
    public function phone($phoneNumber, $type = 0)
    {
        return $this->_phone($phoneNumber, $type);
    }
    
    /**
     * Valida um cep
     * @param string $cepNumber numero do cep contendo 8 dígitos
     * @return bool
     */
    public function cep($cepNumber)
    {
        return $this->_cep($cepNumber);
    }
}
