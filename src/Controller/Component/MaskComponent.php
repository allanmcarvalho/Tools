<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Controller\Component;

use Cake\Controller\Component;
use Tools\Traits\MaskTrait;

/**
 * CakePHP MaskComponent
 * @author allan
 */
class MaskComponent extends Component
{
    use MaskTrait;
    
    public $components = ['Tools.Validate'];
}
