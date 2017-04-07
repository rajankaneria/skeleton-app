<?php

namespace Userapi\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use User\Entity\User;
use User\Model\Db;
use Zend\View\Model\JsonModel;

class UserapiController extends AbstractRestfulController
{

     public function getAllAction()
     {
          $ORM = $this->orm();
          $users = $ORM->getRepository('User\Entity\User')->findAll();
          foreach ($users as $key => $userRow) {
               $userArray[] = $userRow->getArrayCopy();
          }
          return new JsonModel($userArray);
     }

     public function addAction()
     {
          $user = new User();
          $userData = $_POST["userData"];
          $user->set($userData);
          $ORM = $this->orm();
          $ORM->persist($user);
          $ORM->flush();
     }

     public function updateAction()
     {
          $userid = $_POST["userid"];
     	$userData = $_POST["userData"];
          $ORM = $this->orm();
          $user = $ORM->find('User\Entity\User', $userid);
          $user->set($userData);
          $ORM->flush();
          return new JsonModel($userData);
     }

     public function deleteAction()
     {
          $userID = $_POST["userid"];
          $ORM = $this->orm();
          $user = $ORM->find('User\Entity\User', $userID);
          $ORM->remove($user);
          $ORM->flush();
     }

     public function getAction()
     {
          $userID = $_POST["userid"];
          $ORM = $this->orm();
          $user = $ORM->find('User\Entity\User', $userID);
          $userArray = $user->getArrayCopy();
          return new JsonModel($userArray);
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