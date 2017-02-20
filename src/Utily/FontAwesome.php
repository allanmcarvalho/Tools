<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utily;

use Tools\Traits\FontAwesomeTrait;

/**
 * Description of FontAwesome
 *
 * @author allan
 */
class FontAwesome
{
    use FontAwesomeTrait;

    /**
     * Get a FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconName
     * @param array $options
     * @return string
     */
    public static function icon($iconName, $options = [])
    {
        $fa = new FontAwesome();
        return $fa->_icon($iconName, $options);
    }
    
    /**
     * Get a animated FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconName
     * @param string $type Can be "spin" or "pulse"
     * @param array $options
     * @return string
     */
    public static function animatedIcon($iconName, $type, $options = array())
    {
        $fa = new FontAwesome();
        return $fa->_animatedIcon($iconName, $type, $options);
    }

    /**
     * Get a stacked FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconBackground
     * @param \Tools\Abstracts\FAIcons $iconFront
     * @param array $optionsBackground
     * @param array $optionsFront
     * @return string
     */
    public static function stackIcon($iconBackground, $iconFront, $optionsBackground = [], $optionsFront = [])
    {
        $fa = new FontAwesome();
        return $fa->_stackIcon($iconBackground, $iconFront, $optionsBackground, $optionsFront);
    }
}
