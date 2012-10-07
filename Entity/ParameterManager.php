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
use Doctrine\ORM\EntityRepository;
use KDB\ParametersBundle\Model\ParameterInterface;
use KDB\ParametersBundle\Model\ParameterManager as BaseParameterManager;


/**
 * Parameter manager
 *
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 * @author Sergey Gerdel <skif16@ukr.net/>
 */

class ParameterManager extends BaseParameterManager
{
    /**
     * Entity manager.
     *
     * @var EntityManager
     */
    protected $em;

    /**
     * Entity repository.
     *
     * @var EntityRepository
     */
    protected $repository;

    public function __construct(EntityManager $em, $class)
    {
        parent::__construct($class);

        $this->em = $em;
        $this->repository = $this->em->getRepository($this->getClass());
    }

    /**
     * Returns a new Parameter instance
     *
     * @return ParameterInterface
     */
    public function createParameter()
    {

        $class = $this->getClass();

        return new $class;
    }

    /**
     * {@inheritdoc}
     */
    public function persistParameter(ParameterInterface $post)
    {
        $this->em->persist($post);
        $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function removeParameter(ParameterInterface $post)
    {
        $this->em->remove($post);
        $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function findParameter(array $criteria)
    {
        return $this->repository->find($criteria);
    }

    public function findParams()
    {
        return $this->repository->findAll();
    }

    public function findParamByName($name)
    {
        return $this->repository->findOneByName($name);
    }

    public function findActiveParameterByName($name)
    {
        return $this->repository->findOneBy(array('active' => 1, 'name' => $name));
    }

    public function findActiveParams()
    {
        return $this->repository->findBy(array('active' => 1));
    }
}

?>
