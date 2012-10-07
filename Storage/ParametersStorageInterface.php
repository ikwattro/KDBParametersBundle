<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Storage;

/**
 * Interface for parameter storage
 *
 * @package KDBParametersBundle
 * @author Sergey Gerdel <skif16@ukr.net/>
 */

interface ParametersStorageInterface
{
    function get($name, $default = null);

    function getAll();

    function refresh();

    function autoLoad();
}