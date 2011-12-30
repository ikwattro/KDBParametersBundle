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
    
    public function findParams()
    {
        return $this->repository->findAll();
    }
    
    /**
     * @TODO: To be implemented in interface
     * Creates a new Parameter instance
     */
    public function createParameter($name = null)
    {
        if(null === $name)
        {
            $name = '';
        }
        $class = $this->class;
        
        return new $class($name);
        
    }
    
    public function updateParameter(Parameter $parameter, $andFlush = true)
    {
        $this->em->persist($parameter);
        
        if($andFlush)
        {
            $this->em->flush();
        }
    }
    
}

?>
