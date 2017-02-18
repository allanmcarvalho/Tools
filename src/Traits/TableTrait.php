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
trait TableTrait
{
    /**
     * Retira espaços antes ou depois dos dados enviados
     * @param \ArrayObject $data
     * @return \ArrayObject
     */
    private function trimFields($data)
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
     * Formata um nome
     * @param string $name
     * @return string
     */
    private function formatName($name)
    {
        $name = ucwords(strtolower($name));
        $name = str_replace(
                array(
            ' De ',
            ' Do ',
            ' Dos ',
            ' Da ',
            ' Das '
                ), array(
            ' de ',
            ' do ',
            ' dos ',
            ' da ',
            ' das '
                ), $name);
        return $name;
    }

    /**
     * Remove mascara de itens com numero
     * @param string $value
     * @return string
     */
    private function removeMaskFromNumbers($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
    
    private function brDataToDbDate($date)
    {
        if(strlen($date) == 8 or strlen($date) == 10)
        {
            if(count(explode('-', $date)) == 3)
            {
                $dateArray = explode('-', $date);
            }elseif(count(explode('/', $date)) == 3)
            {
                $dateArray = explode('/', $date);
            }else
            {
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Formado de data inválido'));
            }
            
            if($dateArray[0] < 1 or $dateArray[0] > 31)
            {
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Dia da data está em {0} deve estar entre 1 e 31.', $dateArray[0]));
            }
            
            if($dateArray[1] < 1 or $dateArray[1] > 12)
            {
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Mês da data está em {0} deve estar entre 1 e 12.', $dateArray[1]));
            }
            
            if($dateArray[2] < 1 or $dateArray[2] > 3000)
            {
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Ano da data está em {0} deve estar entre 1 e 3000.', $dateArray[2]));
            }
            
            return new \Cake\I18n\Time("{$dateArray[2]}-{$dateArray[1]}-{$dateArray[0]}");
        }else
        {
            throw new \Cake\Error\FatalErrorException(__d('tools', 'Formado de data inválido'));
        }
    }
    
}
