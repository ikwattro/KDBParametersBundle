<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Listener;

use KDB\ParametersBundle\Storage\ParametersStorageInterface;

/**
 * Listener for autoload parameters into memory
 *
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 * @author Sergey Gerdel <skif16@ukr.net/>
 */

class AutoLoadListener
{
    /**
     * @var ParametersStorageInterface
     */
    protected $storage;

    protected $autoLoad;

    public function __construct(ParametersStorageInterface $storage, $autoLoad){
        $this->storage = $storage;
        $this->autoLoad = $autoLoad;
    }

    public function onKernelRequest()
    {
        if ($this->autoLoad){
            $this->storage->autoLoad();
        }
    }

}