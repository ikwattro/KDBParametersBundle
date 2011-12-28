<?php

namespace KDB\ParametersBundle\Entity;

use Doctrine\ORM\EntityManager;



class ParameterManager
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
    public function createParameter($name)
    {
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
