<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utily;

/**
 * Description of WrittenNumber
 *
 * @author allan
 */
class WrittenNumber
{

    const CURRENCY = 1;
    const NUMBER   = 2;

    /**
     *
     * @var double 
     */
    private static $number;
    
    /**
     *
     * @var array 
     */
    private static $thousandSingular = ['mil', 'milhão', 'bilhão', 'trilhão', 'quadrilhão', 'quintilhão'];
    
    /**
     *
     * @var array 
     */
    private static $thousandPlural   = ['mil', 'milhões', 'bilhões', 'trilhões', 'quadrilhões', 'quintilhões'];
    
    /**
     *
     * @var array 
     */
    private static $hundreds         = [
        1 => 'cento', 2 => 'duzentos', 3 => 'trezentos', 4 => 'quatrocentos',
        5 => 'quinhentos', 6 => 'seicentos', 7 => 'setecentos',
        8 => 'oitocentos', 9 => 'novecentos'
    ];
    
    /**
     *
     * @var array 
     */
    private static $dozens           = [
        1 => 'dez', 2 => 'vinte', 3 => 'trinta', 4 => 'quarenta',
        5 => 'cinquenta', 6 => 'sessenta', 7 => 'setenta',
        8 => 'oitenta', 9 => 'noventa'
    ];
    
    /**
     *
     * @var array 
     */
    private static $upToTwenty       = [
        11 => 'onze', 12 => 'doze', 13 => 'treze', 14 => 'quatorze',
        15 => 'quinze', 16 => 'dezesseis', 17 => 'dezessete',
        18 => 'dezoito', 19 => 'dezenove'
    ];
    
    /**
     *
     * @var array 
     */
    private static $upToTen          = [
        1 => 'um', 2 => 'dois', 3 => 'três', 4 => 'quatro', 5 => 'cinco',
        6 => 'seis', 7 => 'sete', 8 => 'oito', 9 => 'nove'
    ];

    /**
     * Convert double to string number
     * @param double $value
     * @param int $type
     * @return string
     * @throws \Cake\Error\FatalErrorException
     */
    public static function number($value = 0, $type = 2)
    {
        if(!is_numeric($value))
        {
            throw new \Cake\Error\FatalErrorException(__d('tools', 'Value must be a numeric value'));
        }
        
        if(!in_array($type, [1,2]))
        {
            throw new \Cake\Error\FatalErrorException(__d('tools', 'Type must be 1 or 2'));
        }
        self::setValue($value);
        return self::setType($type);
    }

    /**
     * 
     * @param double $value
     */
    private static function setValue($value)
    {
        self::$number = number_format($value, 2, ',', '.');
    }

    /**
     * 
     * @param int $type
     * @return string
     */
    private static function setType($type)
    {
        $x       = self::leftover();
        $hundred = (string) $x[count($x) - 1];
        unset($x[count($x) - 1]);
        $x       = array_reverse($x);
        foreach ($x as $key => $value)
        {
            $x[$key] = self::convert($value);
            if ($key > 0)
            {
                $x[$key] .= ( (int) $value == 1 ) ? " " . self::$thousandSingular[$key - 1] : " " . self::$thousandPlural[$key - 1];
            }
        }
        $x = array_filter($x, function($value)
        {
            return (!empty(trim($value)) );
        });
        $x       = array_reverse($x);
        $hundred = self::convert($hundred);
        $dec     = ( $hundred !== 'um' ) ? 's' : null;
        $str     = implode(" e ", $x);
        switch ($type)
        {
            case self::CURRENCY:
                return ( strlen($hundred) > 0 ) ? "{$str} reais e {$hundred} centavo{$dec}" : "{$str} reais";
                break;

            default:
                return ( strlen($hundred) > 0 ) ? "{$str} e {$hundred} centésimo{$dec}" : $str;
                break;
        }
    }

    /**
     * 
     * @return type
     */
    private static function leftover()
    {
        return preg_split("/[,\.]+/", (string) self::$number);
    }

    /**
     * 
     * @param type $v
     * @return type
     */
    private static function convert($v)
    {
        $v = str_pad($v, 3, '0', STR_PAD_LEFT);
        $c = self::hundred($v);
        $d = self::ten($v);

        $u = self::unit($v);
        $p = ( strlen($c) > 0 ) ? '1' : '0';
        $p .= ( strlen($d) > 0 ) ? '1' : '0';
        $p .= ( strlen($u) > 0 ) ? '1' : '0';
        switch ($p)
        {
            case '100':
                return $c;
                break;

            case '110':
                return "{$c} e {$d}";
                break;
            case '111':
                return "{$c} e {$d} e {$u}";
                break;
            case '011':
                return "{$d} e {$u}";
                break;
            case '001':
                return "{$u}";
                break;
            case '010':
                return "{$d}";
                break;
            case '101':
                return "{$c} e {$u}";
                break;
        }
    }

    /**
     * 
     * @param type $v
     * @return string
     */
    private static function hundred($v)
    {
        $s  = substr($v, 0, 1);
        $s1 = substr($v, 1, 2);
        if ($s == '0')
        {
            return null;
        }
        if ($s1 == '00' && $s == '1')
        {
            //if ( $s == '1' ) {
            return 'cem';
            //}
        } else
        {
            return self::$hundreds[(int) $s];
        }
    }

    /**
     * 
     * @param type $v
     * @return type
     */
    private static function ten(&$v)
    {
        $d = '';
        $s = substr($v, 1, 2);
        if (isset(self::$dozens[$s[0]]))
        {
            if ((int) $s % 10 == 0)
            {
                $v = '000';
            }
            $d = self::$dozens[$s[0]];
        }
        if ($s > 10 && $s < 20)
        {
            $v = '000';
            $d = self::$upToTwenty[$s];
        }
        return $d;
    }

    /**
     * 
     * @param type $v
     * @return type
     */
    private static function unit($v)
    {
        $u = '';
        $s = substr($v, 2, 1);
        if ($s !== '0')
        {
            $u = self::$upToTen[(int) $s];
        }
        return $u;
    }

}
