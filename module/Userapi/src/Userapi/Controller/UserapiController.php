<?php

namespace Userapi\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use User\Entity\User;
use User\Model\Db;
use Zend\View\Model\JsonModel;

class UserapiController extends AbstractRestfulController
{
     /**
    * @desc Gets list of all users
    * @return Data of all the users in the database in json format
    */
     public function getAllAction()
     {
          $ORM = $this->orm();
          $users = $ORM->getRepository('User\Entity\User')->findAll();
          foreach ($users as $key => $userRow) {
               $userArray[] = $userRow->getArrayCopy();
          }
          return new JsonModel($userArray);
     }
     /**
     * @desc Adds a user to the database
     * @param userData as post variable which have all the user details needed to be stored
     * @return View with a table of user details
     */
     public function addAction()
     {
          $user = new User();
          $userData = $_POST["userData"];
          $user->set($userData);
          $ORM = $this->orm();
          $ORM->persist($user);
          $ORM->flush();
     }
     /**
     * @desc Updates user details in the database
     * @param userData,userid as post variable which have all the user details needed to be updated and userid
     * @return User details in json format
     */
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
     /**
     * @desc Deletes a user from the database
     * @param userid as post variable, id of the user which needs to be deleted
     */
     public function deleteAction()
     {
          $userID = $_POST["userid"];
          $ORM = $this->orm();
          $user = $ORM->find('User\Entity\User', $userID);
          $ORM->remove($user);
          $ORM->flush();
     }
     /**
     * @desc Gets user details for a specific user id
     * @param userid which is id(primary) for users table
     * @return User data in json format
     */
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