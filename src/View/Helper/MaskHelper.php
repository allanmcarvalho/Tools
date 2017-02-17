<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\View\Helper;

use Cake\View\Helper;
use Tools\Traits\MaskTrait;

/**
 * CakePHP MaskHelper
 * @author allan
 */
class MaskHelper extends Helper
{
    use MaskTrait;
    
    public $helpers = [
        'Tools.Validate'
    ];
}
