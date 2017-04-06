<?php

namespace Common\Entity\Audit;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Entity Listener
 */
class EntityAuditListener implements EventSubscriber
{

    public function getSubscribedEvents()
    {
        return [
            'prePersist',
            'preUpdate'
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (method_exists($entity, 'setCreated')) {
            $entity->setCreated(new \DateTime('now'));
        }

        if (method_exists($entity, 'setUpdated')) {
            $entity->setUpdated(new \DateTime('now'));
        }}

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (method_exists($entity, 'setUpdated')) {
            $entity->setUpdated(new \DateTime('now'));
        }
    }

}
