<?php

namespace App\Doctrine;

use Doctrine\ORM\Mapping as Orm;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

use App\Entity\Resultat;

class ResultatListener {


  /** @var UserPasswordHasherInterface */

  private $hasher;


  /**

   * @param UserPasswordHasherInterface $encoder

   */

  public function __construct() {


  }


  /** @Orm\PrePersist */

  public function prePersist(Resultat $resultat, LifecycleEventArgs $args) {
    $user = $resultat->getUtilisateur();
    $user->setScoreTotal($user->getScoreTotal()+$resultat->getScore());

  }


  /** @Orm\PreUpdate */

  public function preUpdate(Resultat $resultat, PreUpdateEventArgs $args) {

  }

}