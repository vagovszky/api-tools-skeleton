<?php

namespace DoctrineTest\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Planet
 *
 * @author czeeb
 */

/** @ORM\Entity */
class Planet {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string", length=100, nullable=false, unique=true) */
    protected $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
}