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

    private $accentsUppercase   = ['Á', 'À', 'Ã', 'Â', 'Ä', 'Å', 'É', 'Ê', 'È', 'Ë', 'Í', 'Ì', 'Î', 'Ï', 'Ó', 'Ò', 'Ô', 'Õ', 'Ö', 'Ú', 'Ù', 'Û', 'Ü', 'Ç', 'Ñ', 'Ý', 'Æ'];
    private $accentsLowercase   = ['á', 'à', 'ã', 'â', 'ä', 'å', 'é', 'ê', 'è', 'ë', 'í', 'ì', 'î', 'ï', 'ó', 'ò', 'ô', 'õ', 'ö', 'ú', 'ù', 'û', 'ü', 'ç', 'ñ', 'ý', 'æ'];
    private $nameMaintainList   = ["a", "i", "e", "o" . "u", "de", "da", "das", "do", "di", "dos", "ii", "iii", "vi", "iv"];
    private $stringMaintainList = ["de", "da", "das", "do", "di", "dos"];

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
     * 
     * @param string $name
     * @return string
     */
    private function _baseFormat($name)
    {
        if (!empty($name))
        {
            $nameArray = explode(" ", trim(strtolower(str_replace($this->accentsUppercase, $this->accentsLowercase, $name))));
            foreach ($nameArray as $key => $word)
            {
                if ($nameArray[$key] == null)
                {
                    unset($nameArray[$key]);
                }
                if (!in_array($word, $this->nameMaintainList))
                {
                    $nameArray[$key] = ucfirst($word);
                }
            }
            return trim(implode(' ', $nameArray));
        }
    }

    /**
     * Format a name
     * @param string $name
     */
    private function _formatName(&$name)
    {
        $name = $this->_baseFormat($name);
    }

    /**
     * Format a personal name
     * @param string $name
     */
    private function _formatPersonalName(&$name)
    {
        $name = $this->_baseFormat(preg_replace('/[^A-zÀ-ÿ ]/', '', $name));
    }

    /**
     * Format a company name
     * @param string $name
     */
    private function _formatCompanyName(&$name)
    {
        $name = $this->_baseFormat(preg_replace('/[^A-zÀ-ÿ0-9&. ]/', '', $name));
    }

    /**
     * Format a address name
     * @param string $name
     */
    private function _formatAddressName(&$name, $abbreviate = true)
    {
        $address = $this->_baseFormat(preg_replace('/[^A-zÀ-ÿ0-9., ]/', '', $name));
        if ($abbreviate === true)
        {
            $addressArray = explode(' ', $address);
            if (in_array($addressArray[0], ['R', 'Rua']))
            {
                $addressArray[0] = 'R.';
            }
            if (in_array($addressArray[0], ['Av', 'Avenida']))
            {
                $addressArray[0] = 'Av.';
            }
            $address = implode(' ', $addressArray);
        }
        $name = $address;
    }

    /**
     * Format text
     * @param string $string
     */
    private function _formatUcFirst(&$string)
    {
        $string = ucfirst(strtolower($this->_baseFormat($string)));
    }

    private function _formatBasic(&$string)
    {
        if(!empty($string))
        {
            $stringArray = explode(" ", $this->strReplace($this->stringMaintainList, $this->stringMaintainList, $string, true));
            foreach ($stringArray as $key => $word)
            {
                if (substr($word, 0, 1) == '[' and substr($word, (strlen($word) - 1), 1) == ']')
                {
                    $stringArray[$key] = substr($word, 1, (strlen($word) - 2));
                    continue;
                }
                if ($key == 0)
                {
                    $first             = strtoupper(substr($word, 0, 1));
                    $leftover          = str_replace($this->accentsUppercase, $this->accentsLowercase, strtolower(substr($word, 1)));
                    $stringArray[$key] = $first . $leftover;
                }
                if ($stringArray[$key] == null)
                {
                    unset($stringArray[$key]);
                    continue;
                }
                if (strlen($word) > 1 and ! in_array($word, $this->stringMaintainList) and $key > 0)
                {
                    $first             = substr($word, 0, 1);
                    $leftover          = str_replace($this->accentsUppercase, $this->accentsLowercase, strtolower(substr($word, 1)));
                    $stringArray[$key] = $first . $leftover;
                } elseif ($key > 0)
                {
                    $stringArray[$key] = str_replace($this->accentsUppercase, $this->accentsLowercase, strtolower($stringArray[$key]));
                }
            }
            $string = trim(implode(' ', $stringArray));
        }
    }

    /**
     * 
     * @param mixed $search
     * @param mixed $replace
     * @param string $subject
     * @param bool $casesensitive
     * @return string
     */
    private function strReplace($search, $replace, $subject, $casesensitive = false)
    {
        foreach ($search as $key => $item)
        {
            $search[$key]  = ' ' . $item . ' ';
            $replace[$key] = ' ' . $replace[$key] . ' ';
        }
        if ($casesensitive === false)
        {
            return str_replace($search, $replace, $subject);
        } else
        {
            return str_ireplace($search, $replace, $subject);
        }
    }

}
