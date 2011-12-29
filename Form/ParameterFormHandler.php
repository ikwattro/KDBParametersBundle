<?php
/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use KDB\ParametersBundle\Entity\ParameterManager;
use KDB\ParametersBundle\Model\ParameterInterface;

/**
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 */

class ParameterFormHandler
{
    protected $form;
    protected $request;
    protected $parameterManager;
    
    public function __construct(Form $form, Request $request, ParameterManager $manager)
    {
        $this->form = $form;
        $this->request = $request;
        $this->parameterManager = $manager;
    }
    
    public function process(ParameterInterface $parameter = null)
    {
        if(null === $parameter)
        {
            $parameter = $this->parameterManager->createParameter('');
        }
        
        $this->form->setData($parameter);
        
        if('POST' == $this->request->getMethod())
        {
            $this->form->bindRequest($this->request);
            if($this->form->isValid())
            {
                $this->onSuccess($parameter);
                return true;
            }
        }
        
        return false;
    }
    
    public function onSuccess(ParameterInterface $param)
    {
        $this->parameterManager->updateParameter($param);
    }
}
?>
