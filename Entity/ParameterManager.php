<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Entity;

use Doctrine\ORM\EntityManager;
use KDB\ParametersBundle\Model\ParameterInterface;
use KDB\ParametersBundle\Model\ParameterManager as BaseParameterManager;


/**
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 */

class ParameterManager extends BaseParameterManager
{
    protected $em;
    protected $class;
    protected $repository;
    
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        
        $metadata = $em->getClassMetadata($class);
        $this->class = $metadata->name;
        
        $this->repository = $em->getRepository($class);
        
    }
    
    public function getClass()
    {
        return $this->class;
    }
    
    public function findParams()
    {
        return $this->repository->findAll();
    }
    
    public function updateParameter(ParameterInterface $parameter, $andFlush = true)
    {
        $this->em->persist($parameter);
        
        if($andFlush)
        {
            $this->em->flush();
        }
    }
    
    public function findParamByName($name)
    {
        return $this->repository->findParameterByName($name);
    }
    
}

?>
