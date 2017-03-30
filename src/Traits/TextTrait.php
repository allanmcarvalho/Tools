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
        $search       = ['Á', 'À', 'Ã', 'Â', 'Ä', 'Å', 'É', 'Ê', 'È', 'Ë', 'Í', 'Ì', 'Î', 'Ï', 'Ó', 'Ò', 'Ô', 'Õ', 'Ö', 'Ú', 'Ù', 'Û', 'Ü', 'Ç', 'Ñ', 'Ý', 'Æ'];
        $replace      = ['á', 'à', 'ã', 'â', 'ä', 'å', 'é', 'ê', 'è', 'ë', 'í', 'ì', 'î', 'ï', 'ó', 'ò', 'ô', 'õ', 'ö', 'ú', 'ù', 'û', 'ü', 'ç', 'ñ', 'ý', 'æ'];
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
            if(in_array($addressArray[0], ['R', 'Rua']))
            {
                $addressArray[0] = 'R.';
            }
            if(in_array($addressArray[0], ['Av', 'Avenida']))
            {
                $addressArray[0] = 'Av.';
            }
        }
        
        return implode(' ', $addressArray);
    }
    
    /**
     * Format text
     * @param string $string
     * @return string
     */
    private function _formatUcFirst($string)
    {
        return ucfirst(strtolower($this->_formatName($string)));
    }
}
