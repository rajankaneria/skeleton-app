<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Entity\User;
use User\Model\Db;

class UserController extends AbstractActionController
{

     public function indexAction()
     {
          $ORM = $this->orm();
          $users = $ORM->getRepository('User\Entity\User')->findAll();
          foreach ($users as $key => $userRow) {
               $userArray[] = $userRow->getArrayCopy();
          }
          return new ViewModel(array('users' => $userArray));
     }

     public function addAction()
     {

     }

     public function saveAction()
     {
          $user = new User();
          $userData = $_POST["userData"];
          $user->set($userData);
          $ORM = $this->orm();
          $ORM->persist($user);
          $ORM->flush();
     }

     public function editAction()
     {
     	
     }

     public function deleteAction()
     {
          $userID = $_POST["userid"];
          $ORM = $this->orm();
          $user = $ORM->find('User\Entity\User', $userID);
          $ORM->remove($user);
          $ORM->flush();
     }

     /**
     * Method to get Doctrine Entity Manager object
     */
     public function orm()
     {
          $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
          return $em;
     }
}