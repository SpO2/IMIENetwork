<?php

namespace ImieNetwork\SiteBundle\Manager;

/**
 * Description of BaseManager
 *
 * @author damien
 */
abstract class BaseManager
{
    protected function persistAndFlush($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }
}