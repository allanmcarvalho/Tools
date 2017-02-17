<?php

namespace Tools\Traits;

/**
 * CakePHP DataTablesComponent
 * 
 * @property \DataTables\Controller\Component\DataTablesComponent $DataTables
 * 
 * @author allan
 */
use Tools\Abstracts\PhoneTypes;

trait MaskTrait
{

    /**
     * Format a CPF
     * @param string $cpfNumber
     * @return string
     */
    public function cpf($cpfNumber)
    {
        $value = preg_replace('/[^0-9]/', '', strval($cpfNumber));

        if (!$this->Validate->cpf($value))
        {
            return __d('tools', 'CPF inválido');
        }

        $mask = '###.###.###-##';

        return $this->custom($value, $mask);
    }

    /**
     * Format a cnpj
     * @param string $val
     * @return string
     */
    public function cnpj($cnpjNumber)
    {
        $value = preg_replace('/[^0-9]/', '', $cnpjNumber);

        if (!$this->Validate->cnpj($value))
        {
            return __d('tools', 'CNPJ inválido');
        }

        $mask = '##.###.###/####-##';

        return $this->custom($value, $mask);
    }

    /**
     * Format a RG
     * @param string $val
     * @return string
     */
    public function rg($rgNumber)
    {
        $value = preg_replace('/[^0-9]/', '', $rgNumber);

        switch (strlen($value)):
            case 8:
                $mask = '#.###.###-#';
                break;
            case 9:
                $mask = '##.###.###-#';
                break;
            case 10:
                $mask = '###.###.###-#';
                break;
        endswitch;


        return $this->custom($value, $mask);
    }

    /**
     * Format a phone
     * @param string $val
     * @return string
     */
    public function phone($phoneNumber)
    {
        $value = preg_replace('/[^0-9]/', '', $phoneNumber);

        switch (strlen($value)):
            case 3:
                if (!$this->Validate->phone($value, PhoneTypes::SERVICO))
                {
                    return __d('tools', 'Telefone inválido');
                }
                $mask = '###';
                break;
            case 4:
                if (!$this->Validate->phone($value, PhoneTypes::SERVICO))
                {
                    return __d('tools', 'Telefone inválido');
                }
                $mask = '####';
                break;
            case 5:
                if (!$this->Validate->phone($value, PhoneTypes::SERVICO))
                {
                    return __d('tools', 'Telefone inválido');
                }
                $mask   = '#####';
                break;
            case 10:
                $prefix = substr($value, 0, 4);
                if (in_array($prefix, ['0300', '0500', '0800', '0900']))
                {
                    if (!$this->Validate->phone($value, PhoneTypes::NAO_GEOGRAFICOS))
                    {
                        return __d('tools', 'Telefone inválido');
                    }
                    $mask = '####-##-####';
                } else
                {
                    if (!$this->Validate->phone($value))
                    {
                        return __d('tools', 'Telefone inválido');
                    }
                    $mask = '(##) ####-####';
                }
                break;
            case 11:
                $prefix = substr($value, 0, 4);
                if (in_array($prefix, ['0300', '0500', '0800', '0900']))
                {
                    if (!$this->Validate->phone($value, PhoneTypes::NAO_GEOGRAFICOS))
                    {
                        return __d('tools', 'Telefone inválido');
                    }
                    $mask = '####-###-####';
                } else
                {
                    if (substr($value, 0, 1) == "0")
                    {
                        if (!$this->Validate->phone($value))
                        {
                            return __d('tools', 'Telefone inválido');
                        }
                        $mask = '(###) ####-####';
                    } else
                    {
                        if (!$this->Validate->phone($value))
                        {
                            return __d('tools', 'Telefone inválido');
                        }
                        $mask = '(##) #####-####';
                    }
                }
                break;
            case 12:
                if (substr($value, 0, 1) == "0")
                {
                    if (!$this->Validate->phone($value, PhoneTypes::CELULAR))
                    {
                        return __d('tools', 'Telefone inválido');
                    }
                    $mask = '(###) #####-####';
                } else
                {
                    return __d('tools', 'Telefone inválido');
                }
                break;
            default :
                return __d('tools', 'Telefone inválido');
                break;
        endswitch;

        return $this->custom($value, $mask);
    }

    /**
     * Format a CPF
     * @param string $cpfNumber
     * @return string
     */
    public function cep($cepNumber)
    {
        $value = preg_replace('/[^0-9]/', '', strval($cepNumber));

        if (!$this->Validate->cep($value))
        {
            return __d('tools', 'CEP inválido');
        }

        $mask = '##.###-###';

        return $this->custom($value, $mask);
    }
    
    /**
     * Format a custom mask
     * @param string $val
     * @param string $mask
     * @return string
     */
    public function custom($value, $mask)
    {
        $maskared   = '';
        $k          = 0;
        $maskCount  = strlen(preg_replace('/[^\#]/', '', $mask));
        $valueCount = strlen($value);

        if ($maskCount === $valueCount)
        {
            for ($i = 0; $i <= strlen($mask) - 1; $i++)
            {
                if ($mask[$i] == '#')
                {
                    if (isset($value[$k]))
                    {
                        $maskared .= $value[$k++];
                    }
                } else
                {
                    if (isset($mask[$i]))
                    {
                        $maskared .= $mask[$i];
                    }
                }
            }
            return $maskared;
        } else
        {
            return __d('tools', '"mascara" e "valor" não são compativeis');
        }
    }

}
