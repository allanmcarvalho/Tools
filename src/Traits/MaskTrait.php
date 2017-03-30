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
use Cake\Log\Log;
use Psr\Log\LogLevel;

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

            if (!\Tools\Utility\Validate::cpf($value))
            {
                Log::write(LogLevel::ALERT, __d('tools', 'CPF {0} invalid', $cpfNumber));
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

            if (!\Tools\Utility\Validate::cnpj($value))
            {
                Log::write(LogLevel::ALERT, __d('tools', 'CNPJ {0} invalid', $cnpjNumber));
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

            if (!\Tools\Utility\Validate::rg($value))
            {
                Log::write(LogLevel::ALERT, __d('tools', 'RG {0} invalid', $rgNumber));
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
                    if (!\Tools\Utility\Validate::phone($value, PhoneTypes::SERVICE))
                    {
                        Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                        return __d('tools', 'Phone invalid');
                    }
                    $mask = '###';
                    break;
                case 4:
                    if (!\Tools\Utility\Validate::phone($value, PhoneTypes::SERVICE))
                    {
                        Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                        return __d('tools', 'Phone invalid');
                    }
                    $mask = '####';
                    break;
                case 5:
                    if (!\Tools\Utility\Validate::phone($value, PhoneTypes::SERVICE))
                    {
                        Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                        return __d('tools', 'Phone invalid');
                    }
                    $mask   = '#####';
                    break;
                case 10:
                    $prefix = substr($value, 0, 4);
                    if (in_array($prefix, ['0300', '0500', '0800', '0900']))
                    {
                        if (!\Tools\Utility\Validate::phone($value, PhoneTypes::NON_REGIONAL))
                        {
                            Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '####-##-####';
                    } else
                    {
                        if (!\Tools\Utility\Validate::phone($value))
                        {
                            Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '(##) ####-####';
                    }
                    break;
                case 11:
                    $prefix = substr($value, 0, 4);
                    if (in_array($prefix, ['0300', '0500', '0800', '0900']))
                    {
                        if (!\Tools\Utility\Validate::phone($value, PhoneTypes::NON_REGIONAL))
                        {
                            Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '####-###-####';
                    } else
                    {
                        if (substr($value, 0, 1) == "0")
                        {
                            if (!\Tools\Utility\Validate::phone($value))
                            {
                                Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                                return __d('tools', 'Phone invalid');
                            }
                            $mask = '(###) ####-####';
                        } else
                        {
                            if (!\Tools\Utility\Validate::phone($value))
                            {
                                Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                                return __d('tools', 'Phone invalid');
                            }
                            $mask = '(##) #####-####';
                        }
                    }
                    break;
                case 12:
                    if (substr($value, 0, 1) == "0")
                    {
                        if (!\Tools\Utility\Validate::phone($value, PhoneTypes::CELLPHONE))
                        {
                            Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                            return __d('tools', 'Phone invalid');
                        }
                        $mask = '(###) #####-####';
                    } else
                    {
                        Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
                        return __d('tools', 'Phone invalid');
                    }
                    break;
                default :
                    Log::write(LogLevel::ALERT, __d('tools', 'Phone {0} invalid', $phoneNumber));
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

            if (!\Tools\Utility\Validate::cep($value))
            {
                Log::write(LogLevel::ALERT, __d('tools', 'CEP {0} invalid', $cepNumber));
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
            Log::write(LogLevel::ALERT, __d('tools', 'mask:"{0}" and value:"{1}" are not compatible', $value, $mask));
            return __d('tools', '"mask" and "value" are not compatible');
        }
    }

}
