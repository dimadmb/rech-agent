<?php

namespace BaseBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CruiseShipCabinCruisePriceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CruiseShipCabinCruisePriceRepository extends EntityRepository
{
	public function findByCruiseWithTariff($cruise_id, $tarrif) {
		$q = "SELECT price, cab, room
			FROM BaseBundle\Entity\CruiseShipCabinCruisePrice price 
			
			LEFT JOIN price.cabin cab
			
			LEFT JOIN cab.rooms room
			
			WHERE price.tariff = ?1
			
			AND price.cruise = ?2
			
			";
		$query = $this->_em->createQuery($q);
		$query->setParameter(1, $tarrif);
		$query->setParameter(2, $cruise_id);
   		return $query->getResult();
	}	
	
}