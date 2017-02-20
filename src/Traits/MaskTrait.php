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
    protected function _cpf($cpfNumber = null)
    {
        if (!empty($cpfNumber))
        {
            $value = preg_replace('/[^0-9]/', '', strval($cpfNumber));

            if (!\Tools\Utily\Validate::cpf($value))
            {
                return __d('tools', 'CPF invalid');
            }

            $mask = '###.###.###-##';

            return $this->_custom($value, $mask);
        }
        return $cpfNumber;
    }

    /**
     * Format a cnpj
     * @param string $cnpjNumber
     * @return string
     */
    protected function _cnpj($cnpjNumber)
    {
        if (!empty($cnpjNumber))
        {
            $value = preg_replace('/[^0-9]/', '', $cnpjNumber);

            if (!\Tools\Utily\Validate::cnpj($value))
            {
                return __d('tools', 'CNPJ invalid');
            }

            $mask = '##.###.###/####-##';

            return $this->_custom($value, $mask);
        }
        return $cnpjNumber;
    }

    /**
     * Format a RG
     * @param string $rgNumber
     * @return string
     */
    protected function _rg($rgNumber)
    {
        if (!empty($rgNumber))
        {
            $value = preg_replace('/[^0-9]/', '', $rgNumber);

            if (!\Tools\Utily\Validate::rg($value))
            {
                return __d('tools', 'RG invalid');
            }

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

            return $this->_custom($value, $mask);
        }
        return $rgNumber;
    }

    /**
     * Format a phone
     * @param string $phoneNumber
     * @return string
     */
    protected function _phone($phoneNumber)
    {
        if (!empty($phoneNumber))
        {
            $value = preg_replace('/[^0-9]/', '', $phoneNumber);

            switch (strlen($value)):
                case 3:
                    if (!\Tools\Utily\Validate::phone($value, PhoneTypes::SERVICE))
                    {
                        return __d('tools', 'Phone invalid');
                    }
                    $mask = '###';
                    break;
                case 4:
                    if (!\Tools\Utily\Validate::phone($value, PhoneTypes::SERVICE))
                    {
                        return __d('tools', 'Phone invalid');
                    }
                    $mask = '####';
                    break;
                case 5:
                    if (!\Tools\Utily\Validate::phone($value, PhoneTypes::SERVICE))
                    {
                        return __d('tools', 'Phone invalid');
                    }
                    $mask   = '#####';
                    break;
                case 10:
                    $prefix = substr($value, 0, 4);
                    if (in_array($prefix, ['0300', '0500', '0800', '0900']))
                    {
                        if (!\Tools\Utily\Validate::phone($value, PhoneTypes::NON_REGIONAL))
                        {
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '####-##-####';
                    } else
                    {
                        if (!\Tools\Utily\Validate::phone($value))
                        {
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '(##) ####-####';
                    }
                    break;
                case 11:
                    $prefix = substr($value, 0, 4);
                    if (in_array($prefix, ['0300', '0500', '0800', '0900']))
                    {
                        if (!\Tools\Utily\Validate::phone($value, PhoneTypes::NON_REGIONAL))
                        {
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '####-###-####';
                    } else
                    {
                        if (substr($value, 0, 1) == "0")
                        {
                            if (!\Tools\Utily\Validate::phone($value))
                            {
                                return __d('tools', 'Phone invalid');
                            }
                            $mask = '(###) ####-####';
                        } else
                        {
                            if (!\Tools\Utily\Validate::phone($value))
                            {
                                return __d('tools', 'Phone invalid');
                            }
                            $mask = '(##) #####-####';
                        }
                    }
                    break;
                case 12:
                    if (substr($value, 0, 1) == "0")
                    {
                        if (!\Tools\Utily\Validate::phone($value, PhoneTypes::CELLPHONE))
                        {
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '(###) #####-####';
                    } else
                    {
                        return __d('tools', 'Phone invalid');
                    }
                    break;
                default :
                    return __d('tools', 'Phone invalid');
                    break;
            endswitch;

            return $this->_custom($value, $mask);
        }
        return $phoneNumber;
    }

    /**
     * Format a CPF
     * @param string $cepNumber
     * @return string
     */
    protected function _cep($cepNumber)
    {
        if (!empty($cepNumber))
        {
            $value = preg_replace('/[^0-9]/', '', strval($cepNumber));

            if (!\Tools\Utily\Validate::cep($value))
            {
                return __d('tools', 'CEP invalid');
            }

            $mask = '##.###-###';

            return $this->_custom($value, $mask);
        }
        return $cepNumber;
    }

    /**
     * Format a custom mask
     * @param string $value
     * @param string $mask
     * @return string
     */
    protected function _custom($value, $mask)
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
            return __d('tools', '"mask" and "value" are not compatible');
        }
    }

}
