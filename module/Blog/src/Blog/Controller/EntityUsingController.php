<?php
namespace Blog\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;

class EntityUsingController extends AbstractActionController
{
    /**
    * @var EntityManager
    */
   protected $entityManager;
 
    /**
     * Sets the EntityManager
     *
     * @param EntityManager $em
     * @access protected
     * @return PostController
     */
    protected function setEntityManager(EntityManager $em)
    {
        $this->entityManager = $em;
        return $this;
    }
 
    /**
     * Returns the EntityManager
     *
     * Fetches the EntityManager from ServiceLocator if it has not been initiated
     * and then returns it
     *
     * @access protected
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        if (null === $this->entityManager) {
              $this->setEntityManager($this->getServiceLocator()->get('doctrine.entitymanager.orm_default'));
        }
        return $this->entityManager;
    }
}