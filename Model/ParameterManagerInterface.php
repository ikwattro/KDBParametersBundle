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
 * Interface for parameter manager
 *
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 * @author Sergey Gerdel <skif16@ukr.net/>
 */

interface ParameterManagerInterface
{
    /**
     * Creates new parameter
     *
     * @return ParameterInterface
     */
    function createParameter();

    /**
     * Persist parameter.
     *
     * @param ParameterInterface
     */
    function persistParameter(ParameterInterface $parameter);

    /**
     * Removes parameter.
     *
     * @param ParameterInterface $parameter
     */
    function removeParameter(ParameterInterface $parameter);

    /**
     * Finds parameter by criteria.
     *
     * @param array $criteria
     * @return ParameterInterface
     */
    function findParameter(array $criteria);

    /**
     * Returns FQCN of parameter.
     *
     * @return string
     */
    function getClass();
}
