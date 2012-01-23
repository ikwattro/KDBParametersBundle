<?php

namespace KDB\ParametersBundle\Model;

interface ParameterManagerInterface
{
    function createParameter();
    
    function deleteParameter(ParameterInterface $parameter);
    
    function findParameter(array $criteria);
}
