<?php

namespace BaseBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CruiseCruiseCategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CruiseCruiseCategoryRepository extends EntityRepository
{
	public function findWithCruises($categoryCode) {
		$q = "SELECT cc, c, s, p 
			FROM BaseBundle\Entity\CruiseCruiseCategory cc 
			JOIN cc.cruise c
			LEFT JOIN c.prices p
			JOIN c.ship s
			WHERE cc.code = ?1
			AND p.tariff = 1
			ORDER BY c.startdate
			";
		$query = $this->_em->createQuery($q);
		$query->setParameter(1, $categoryCode);
   		return $query->getSingleResult();
	}	
	
}
