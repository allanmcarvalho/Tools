<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Controller\Component;

use Cake\Controller\Component;
use Tools\Traits\TextTrait;

/**
 * CakePHP TextComponent
 * @author allan
 */
class TextComponent extends Component
{

    use TextTrait;

    /**
     * format address name
     * @param string $name
     * @param bool $abbreviate
     * @return string
     */
    public function formatAddressName($name, $abbreviate = true)
    {
        return $this->_formatAddressName($name, $abbreviate);
    }

    /**
     * format company name
     * @param string $name
     * @return string
     */
    public function formatCompanyName($name)
    {
        return $this->_formatCompanyName($name);
    }

    /**
     * format a name
     * @param string $name
     * @return string
     */
    public function formatName($name)
    {
        return $this->_formatName($name);
    }

    /**
     * format a personal name
     * @param string $name
     * @return string
     */
    public function formatPersonalName($name)
    {
        return $this->_formatPersonalName($name);
    }

}
