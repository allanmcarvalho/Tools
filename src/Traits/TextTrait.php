<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Traits;

/**
 * Description of TableTrait
 *
 * @author allan
 */
trait TextTrait
{

    /**
     * Remove spaces before and/or after send data
     * @param \ArrayObject $data
     * @return \ArrayObject
     */
    private function _trimFields($data)
    {
        foreach ($data as $item => $value)
        {
            if (!is_array($data[$item]))
            {
                $data[$item] = trim($value);
            }
        }
        return $data;
    }

    /**
     * Format a name
     * @param string $name
     * @return string
     */
    private function _formatName($name)
    {
        $search       = ['Á', 'À', 'Ã', 'É', 'Ê', 'Í', 'Ó', 'Õ', 'Ú', 'Ç'];
        $replace      = ['á', 'à', 'ã', 'é', 'ê', 'í', 'ó', 'õ', 'ú', 'ç'];
        $maintainList = ["a", "i", "e", "de", "da", "das", "do", "di", "dos", "ii", "iii", "vi", "iv"];
        $nameArray    = explode(" ", trim(strtolower(str_replace($search, $replace, $name))));
        foreach ($nameArray as $key => $word)
        {
            if($nameArray[$key] == null)
            {
                unset($nameArray[$key]);
            }
            if (!in_array($word, $maintainList))
            {
                $nameArray[$key] = ucfirst($word);
            }
        }
        return trim(implode(' ', $nameArray));
    }
    
    /**
     * Format a personal name
     * @param string $name
     * @return string
     */
    private function _formatPersonalName($name)
    {
        return $this->_formatName(preg_replace('/[^A-zÀ-ÿ0-9 ]/', '', $name));
    }
    
    /**
     * Format a company name
     * @param string $name
     * @return string
     */
    private function _formatCompanyName($name)
    {
        return $this->_formatName(preg_replace('/[^A-zÀ-ÿ0-9& ]/', '', $name));
    }
    
    /**
     * Format a address name
     * @param string $name
     * @return string
     */
    private function _formatAddressName($name, $abbreviate = true)
    {
        $address = $this->_formatName(preg_replace('/[^A-zÀ-ÿ0-9 ]/', '', $name));
        if($abbreviate === true)
        {
            $addressArray = explode(' ', $address);
            if($addressArray[0] == 'Rua')
            {
                $addressArray[0] = 'R.';
            }
            if($addressArray[0] == 'Avenida')
            {
                $addressArray[0] = 'Av.';
            }
        }
        
        return implode(' ', $addressArray);
    }
}
