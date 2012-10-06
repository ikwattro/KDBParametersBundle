<?php

    /*
     * This file is part of the KDBParametersBundle.
     *
     * (c) Sergey Gerdel
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

namespace KDB\ParametersBundle\Storage;

interface ParametersStorageInterface
{
    function get($name, $default = null);

    function getAll();

    function refresh();

    function autoLoad();
}