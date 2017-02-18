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

trait ValidateTrait
{

    private function _getCpfDigitsSum($numbers, $second = false)
    {
        if ($second == false)
        {
            $positions = 10;
        } else
        {
            $positions = 11;
        }

        $sumOfNumbers = 0;
        for ($i = 0; $i < strlen($numbers); $i++)
        {
            $sumOfNumbers += $numbers[$i] * $positions;
            $positions--;
        }
        return $sumOfNumbers;
    }

    private function _getCnpjDigitsSum($numbers, $second = false)
    {
        $sumOfNumbers = 0;
        if ($second == false)
        {
            $positions = 5;
            for ($i = 0; $i < 4; $i++)
            {
                $sumOfNumbers += $numbers[$i] * $positions;
                $positions--;
            }

            $positions = 9;
            for ($i = 4; $i < strlen($numbers); $i++)
            {
                $sumOfNumbers += $numbers[$i] * $positions;
                $positions--;
            }
        } else
        {
            $positions = 6;
            for ($i = 0; $i < 5; $i++)
            {
                $sumOfNumbers += $numbers[$i] * $positions;
                $positions--;
            }

            $positions = 9;
            for ($i = 5; $i < strlen($numbers); $i++)
            {
                $sumOfNumbers += $numbers[$i] * $positions;
                $positions--;
            }
        }

        return $sumOfNumbers;
    }

    private function _getCpfCnpjVerificationDigit($sum)
    {
        $sum = $sum % 11;
        if ($sum < 2)
        {
            return $sum = 0;
        } else
        {
            return $sum = 11 - $sum;
        }
    }

    protected function _cpf($cpfNumber = null)
    {
        if ($cpfNumber == null)
        {
            return false;
        }

        $value = $cpfNumber;

        if (strlen($value) != 11)
        {
            return false;
        }

        $numbers = substr($value, 0, 9);
        $newCpf  = $numbers . $this->_getCpfCnpjVerificationDigit($this->_getCpfDigitsSum($numbers));
        $newCpf  = $newCpf . $this->_getCpfCnpjVerificationDigit($this->_getCpfDigitsSum($newCpf, true));

        if ($newCpf === $cpfNumber)
        {
            return true;
        } else
        {
            return false;
        }
    }

    protected function _cnpj($cnpjNumber = null)
    {
        if ($cnpjNumber == null)
        {
            return false;
        }

        $value = $cnpjNumber;

        if (strlen($value) != 14)
        {
            return false;
        }

        $numbers = substr($value, 0, 12);
        $newCnpj = $numbers . $this->_getCpfCnpjVerificationDigit($this->_getCnpjDigitsSum($numbers));
        $newCnpj = $newCnpj . $this->_getCpfCnpjVerificationDigit($this->_getCnpjDigitsSum($newCnpj, true));

        if ($newCnpj === $cnpjNumber)
        {
            return true;
        } else
        {
            return false;
        }
    }

    protected function _rg($rgNumber = null)
    {
        if ($rgNumber == null)
        {
            return false;
        }
        $value = $rgNumber;
        return ((bool) preg_match('/^([0-9]{8}|[0-9]{9}|[0-9]{10})$/', $value));
    }

    protected function _phone($phoneNumber = null, $type = null)
    {
        if ($phoneNumber == null)
        {
            return false;
        }
        $value = $phoneNumber;

        if ($type == null)
        {
            if (in_array(substr($value, 0, 4), ['0800', '0300', '0500', '0900']))
            {
                $type = PhoneTypes::NAO_GEOGRAFICOS;
            }

            if (strlen($value) >= 3 and strlen($value) <= 5)
            {
                $type = PhoneTypes::SERVICO;
            }
        }

        if ($type === PhoneTypes::PADRAO)
        {
            return ((bool) preg_match('/^('
                            . '[1-9]{2}[1-9]{1}[0-9]{3}[0-9]{4}'
                            . '|[1-9]{2}[9][1-9]{1}[0-9]{3}[0-9]{4}'
                            . '|[0][1-9]{2}[1-9]{1}[0-9]{3}[0-9]{4}'
                            . '|[0][1-9]{2}[9][1-9]{1}[0-9]{3}[0-9]{4}'
                            . ')$/', $value));
        }

        if ($type === PhoneTypes::TELEFONE)
        {
            return ((bool) preg_match('/^('
                            . '[1-9]{2}[1-4]{1}[0-9]{3}[0-9]{4}'
                            . '|[0][1-9]{2}[1-4]{1}[0-9]{3}[0-9]{4}'
                            . ')$/', $value));
        }

        if ($type === PhoneTypes::CELULAR)
        {
            return ((bool) preg_match('/^('
                            . '[1-9]{2}[5-9]{1}[0-9]{3}[0-9]{4}'
                            . '|[1-9]{2}[9][5-9]{1}[0-9]{3}[0-9]{4}'
                            . '|[0][1-9]{2}[5-9]{1}[0-9]{3}[0-9]{4}'
                            . '|[0][1-9]{2}[9][5-9]{1}[0-9]{3}[0-9]{4}'
                            . ')$/', $value));
        }

        if ($type === PhoneTypes::NAO_GEOGRAFICOS)
        {
            return ((bool) preg_match('/^('
                            . '[0][3,5,8,9][0]{2}[0-9]{3}[0-9]{4}'
                            . '|[0][3,5,8,9][0]{2}[0-9]{2}[0-9]{4}'
                            . ')$/', $value));
        }

        if ($type === PhoneTypes::SERVICO)
        {
            return ((bool) preg_match('/^('
                            . '[1][0-9]{2}'
                            . '|[1][0-9]{3}'
                            . '|[1][0-9]{4}'
                            . ')$/', $value));
        }
        return false;
    }

    protected function _cep($cepNumber = null)
    {
        if ($cepNumber == null)
        {
            return false;
        }
        $value = $cepNumber;
        return ((bool) preg_match('/^([0-9]{8})$/', $value));
    }

}
