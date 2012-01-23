<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Model;

/**
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 */

class ParameterManager implements ParameterManagerInterface
{
    public function createParameter()
    {
        /**
         * Returns a new Parameter instance
         * 
         * @return ParameterInterface
         */
        $class = $this->getClass();
        
        return new $class;
    }
}
?>
