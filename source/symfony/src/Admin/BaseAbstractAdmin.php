<?php
/**
 * Created by PhpStorm.
 * User: juanpablo
 * Date: 2019-03-04
 * Time: 21:09
 */

namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class BaseAbstractAdmin extends AbstractAdmin
{

    public function prePersist($object)
    {
        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        $object->setCreatedBy($user);
        $object->setUpdatedBy($user);

        $object->setCreatedAt();
        $object->setUpdatedAt();
    }

    public function preUpdate($object)
    {
        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        $object->setUpdatedBy($user);
        $object->setUpdatedAt();
    }

}