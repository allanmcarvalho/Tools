<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utily;

use Tools\Traits\TableTrait;

/**
 * Description of Table
 *
 * @author allan
 */
class Table
{
    use TableTrait;
    
    /**
     * Format a name
     * @param string $name
     * @return string
     */
    public static function _formatName($name)
    {
        $table = new Table();
        return $table->_formatName($name);
    }

    /**
     * Remove mask from numbered items
     * @param string $value
     * @return string
     */
    public static function _removeMaskFromNumbers($value)
    {
        $table = new Table();
        return $table->_removeMaskFromNumbers($value);
    }
    
    
    /**
     * Converts a Brazilian date to the database format
     * @param string $date Ex.: 20/02/2017; 20/02/17; 20-02-2017; 20-02-17
     * @return \Cake\I18n\Time
     * @throws \Cake\Error\FatalErrorException
     */
    public static function brDataToDbDate($date)
    {
        $table = new Table();
        return $table->_brDataToDbDate($date);
    }
}
