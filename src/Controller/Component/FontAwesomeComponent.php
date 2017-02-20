<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Controller\Component;

use Cake\Controller\Component;
use Tools\Traits\FontAwesomeTrait;

/**
 * CakePHP FontAwesomeComponent
 * @author allan
 */
class FontAwesomeComponent extends Component
{

    use FontAwesomeTrait;

    /**
     * Get a FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconName
     * @param array $options
     * @return string
     */
    public function icon($iconName, $options = [])
    {
        return $this->_icon($iconName, $options);
    }

    /**
     * Get a animated FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconName
     * @param string $type Can be "spin" or "pulse"
     * @param array $options
     * @return string
     */
    public function animatedIcon($iconName, $type, $options = array())
    {
        return $this->_animatedIcon($iconName, $type, $options);
    }

    /**
     * Get a stacked FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconBackground
     * @param \Tools\Abstracts\FAIcons $iconFront
     * @param array $optionsBackground
     * @param array $optionsFront
     * @return string
     */
    public function stackIcon($iconBackground, $iconFront, $optionsBackground = [], $optionsFront = [])
    {
        return $this->_stackIcon($iconBackground, $iconFront, $optionsBackground, $optionsFront);
    }

}
