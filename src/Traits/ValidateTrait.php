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

    private function getCpfDigitsSum($numbers, $second = false)
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

    private function getCnpjDigitsSum($numbers, $second = false)
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

    private function getCpfCnpjVerificationDigit($sum)
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

    public function cpf($cpfNumber = null)
    {
        if ($cpfNumber == null)
        {
            return false;
        }

        $value = preg_replace('/[^0-9]/', '', $cpfNumber);

        if (strlen($value) != 11)
        {
            return false;
        }

        $numbers = substr($value, 0, 9);
        $newCpf  = $numbers . $this->getCpfCnpjVerificationDigit($this->getCpfDigitsSum($numbers));
        $newCpf  = $newCpf . $this->getCpfCnpjVerificationDigit($this->getCpfDigitsSum($newCpf, true));

        if ($newCpf === $cpfValue)
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function cnpj($cnpjNumero = null)
    {
        if ($cnpjNumero == null)
        {
            return false;
        }

        $value = preg_replace('/[^0-9]/', '', $cnpjNumero);

        if (strlen($value) != 14)
        {
            return false;
        }

        $numbers = substr($value, 0, 12);
        $newCnpj = $numbers . $this->getCpfCnpjVerificationDigit($this->getCnpjDigitsSum($numbers));
        $newCnpj = $newCnpj . $this->getCpfCnpjVerificationDigit($this->getCnpjDigitsSum($newCnpj, true));

        if ($newCnpj === $cnpjValue)
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function phone($phoneNumber, $type = 0)
    {
        $value = preg_replace('/[^0-9]/', '', $phoneNumber);

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
    
    public function cep($cepNumber)
    {
        $value = preg_replace('/[^0-9]/', '', $cepNumber);
        return ((bool) preg_match('/^([0-9]{8})$/', $value));
    }

}
