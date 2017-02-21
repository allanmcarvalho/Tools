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
     * Remove mask from numbered items
     * @param string $value
     * @return string
     */
    private function _removeMaskFromNumbers($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
    
    
    /**
     * Converts a Brazilian date to the database format
     * @param string $date Ex.: 20/02/2017; 20/02/17; 20-02-2017; 20-02-17
     * @return \Cake\I18n\Time
     * @throws \Cake\Error\FatalErrorException
     */
    private function _brDataToDbDate($date)
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
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Invalid date format'));
            }
            
            if($dateArray[0] < 1 or $dateArray[0] > 31)
            {
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Date day is on {0} must be between 1 and 31.', $dateArray[0]));
            }
            
            if($dateArray[1] < 1 or $dateArray[1] > 12)
            {
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Date month is on {0} must be between 1 and 12.', $dateArray[1]));
            }
            
            if($dateArray[2] < 1 or $dateArray[2] > 3000)
            {
                throw new \Cake\Error\FatalErrorException(__d('tools', 'Date year is on {0} must be between 1 and 3000.', $dateArray[2]));
            }
            
            return new \Cake\I18n\Time("{$dateArray[2]}-{$dateArray[1]}-{$dateArray[0]}");
        }else
        {
            throw new \Cake\Error\FatalErrorException(__d('tools', 'Invalid date format'));
        }
    }
    
}
