<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Traits;

/**
 * Description of FontAwesomeTrait
 *
 * @author allan
 */
trait FontAwesomeTrait
{

    /**
     * Class
     * @var array 
     */
    private $class = [];

    /**
     * Get a FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconName
     * @param array $options
     * @return string
     */
    protected function _icon($iconName, $options = [])
    {
        $this->class[] = 'fa';
        $this->class[] = $iconName;

        if (!empty($options['size']))
        {
            $this->getSize($options['size']);
            unset($options['size']);
        }

        if (!empty($options['rotate']))
        {
            $this->getRotate($options['rotate']);
            unset($options['rotate']);
        }

        if (!empty($options['border']))
        {
            $options['border'] == true ? $this->class[] = 'fa-border' : '';
            unset($options['border']);
        }

        if (!empty($options['fw']))
        {
            $options['fw'] == true ? $this->class[] = 'fa-fw' : '';
            unset($options['fw']);
        }

        if (!empty($options['quote']))
        {
            $options['quote'] == 'left' ? $this->class[] = 'fa-quote-left' : '';
            $options['quote'] == 'right' ? $this->class[] = 'fa-quote-right' : '';
            unset($options['quote']);
        }

        if (!empty($options['pull']))
        {
            $options['pull'] == 'left' ? $this->class[] = 'fa-pull-left' : '';
            $options['pull'] == 'right' ? $this->class[] = 'fa-pull-right' : '';
            unset($options['pull']);
        }

        if (!empty($options['animated']))
        {
            $options['animated'] == 'spin' ? $this->class[] = 'fa-spin' : '';
            $options['animated'] == 'pulse' ? $this->class[] = 'fa-pulse' : '';
            unset($options['animated']);
        }

        if (!empty($options['space']))
        {
            $space = $this->getSpace($options['space']);
            unset($options['space']);
        } else
        {
            $space = [
                'before' => '',
                'after' => ''
            ];
        }

        if (!empty($options['class']))
        {
            $classes = explode(' ', $options['class']);
            foreach ($classes as $class)
            {
                $this->class[] = $class;
            }
            unset($options['animated']);
        }

        $this->class = array_unique($this->class);

        $html        = $space['before'] . '<i class="' . implode(' ', $this->class) . '"></i>' . $space['after'];
        $this->class = [];
        return $html;
    }

    /**
     * Get a animated FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconName
     * @param string $type Can be "spin" or "pulse"
     * @param array $options
     * @return string
     */
    protected function _animatedIcon($iconName, $type, $options = [])
    {
        $options += [
            'animated' => $type
        ];

        return $this->_icon($iconName, $options);
    }

    /**
     * Get a stacked FontAwesome Icon
     * @param \Tools\Abstracts\FAIcons $iconBackground
     * @param \Tools\Abstracts\FAIcons $iconFront
     * @param array $optionsBackground
     * @param array $optionsFront
     * @return string
     */
    protected function _stackIcon($iconBackground, $iconFront, $optionsBackground = [], $optionsFront = [])
    {
        $html          = "<span class='fa-stack fa-lg'>";
        $this->class[] = 'fa-stack-2x';
        $html          .= $this->_icon($iconBackground, $optionsBackground);
        $this->class[] = 'fa-stack-1x';
        $html          .= $this->_icon($iconFront, $optionsFront);
        $html          .= '</span>';

        return $html;
    }

    /**
     * Get a FontAwesome size css class
     * @param \Tools\Abstracts\FASize $size
     */
    private function getSize($size)
    {
        switch ($size)
        {
            case 'lg':
                $this->class[] = 'fa-lg';
                break;
            case '2':
                $this->class[] = 'fa-2x';
                break;
            case '3':
                $this->class[] = 'fa-3x';
                break;
            case '4':
                $this->class[] = 'fa-4x';
                break;
            case '5':
                $this->class[] = 'fa-5x';
                break;
        }
    }

    /**
     * Get a FontAwesome rotate css class
     * @param string $angle can be 90, 180 and 270
     */
    private function getRotate($angle)
    {
        switch ($angle)
        {
            case '90':
                $this->class[] = 'fa-rotate-90';
                break;
            case '180':
                $this->class[] = 'fa-rotate-180';
                break;
            case '270':
                $this->class[] = 'fa-rotate-270';
                break;
        }
    }

    /**
     * Get a space before e after icon
     * @param string $type
     * @return array
     */
    private function getSpace($type)
    {
        switch ($type)
        {
            case 'before':
                $space = [
                    'before' => '&nbsp;',
                    'after' => ''
                ];
                break;
            case 'after':
                $space = [
                    'before' => '',
                    'after' => '&nbsp;'
                ];
                break;
            case 'both':
                $space = [
                    'before' => '&nbsp;',
                    'after' => '&nbsp;'
                ];
                break;
            default :
                $space = [
                    'before' => '',
                    'after' => ''
                ];
                break;
        }
        return $space;
    }

}
