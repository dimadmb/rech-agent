<?php

namespace BaseBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CruiseCruiseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CruiseCruiseRepository extends EntityRepository
{
	public function findMonths() {
		$str = "SELECT c.startdate
			FROM BaseBundle\Entity\CruiseCruise c
			ORDER BY c.startdate";
   		$q = $this->_em->createQuery($str);
   		return $q->getResult();
	}
	
	public function findForMonth($time) {
		$str = "SELECT c, s, pr
			FROM BaseBundle\Entity\CruiseCruise c
			JOIN c.ship s 
			LEFT JOIN c.prices pr
			WHERE c.startdate >= ?1 AND c.startdate < ?2
			ORDER BY c.startdate";
   		$q = $this->_em->createQuery($str);
   		$q->setParameter(1, $time);
   		$q->setParameter(2, mktime(0,0,0,date("m", $time) + 1, 1, date("Y", $time)));
   		return $q->getResult();
	}	

	public function findAllOrdered() {
		$q = "SELECT c, s, pr
			FROM BaseBundle\Entity\CruiseCruise c 
			JOIN c.ship s 
			LEFT JOIN c.prices pr
			ORDER BY c.startdate ASC, s.title ASC";
   		return $this->_em->createQuery($q)->/*setHint(Query::HINT_FORCE_PARTIAL_LOAD, true)->*/getResult();
	}	
	
	public function findByUrl(\BaseBundle\Controller\Helper\CruiseUrl $url) {
		$str = "SELECT c, s, pi, pr,   pl 
			FROM BaseBundle\Entity\CruiseCruise c 
			JOIN c.ship s
			LEFT JOIN c.programItems pi
			LEFT JOIN c.prices pr
			LEFT JOIN pi.place pl
			
			
			WHERE s.code = ?1 
			AND c.code = ?2
			
			ORDER BY  pi.date, pr.price";
   		$q = $this->_em->createQuery($str);
   		$q->setParameter(1, $url->getShipCode());
   		$q->setParameter(2, $url->getCode());
   		return $q->getOneOrNullResult();
	}	

	public function findByUrlPrice(\BaseBundle\Controller\Helper\CruiseUrl $url) {
		$str = "SELECT c, s, pr, cab, room, roomProp,   rt, deck, rp, tariff
			FROM BaseBundle\Entity\CruiseCruise c 
			JOIN c.ship s
			LEFT JOIN s.cabins cab
			LEFT JOIN cab.prices pr
			LEFT JOIN cab.rooms room
			LEFT JOIN room.roomId roomProp
			LEFT JOIN pr.rp_id rp
			LEFT JOIN pr.tariff tariff
			LEFT JOIN cab.rtId rt
			LEFT JOIN cab.deckId deck
			WHERE s.code = ?1 
			AND c.code = ?2
			AND pr.cruise = c.id
			

			
			ORDER BY deck.deckId , room.roomNumber*1 , tariff.id , pr.price";
   		$q = $this->_em->createQuery($str);
   		$q->setParameter(1, $url->getShipCode());
   		$q->setParameter(2, $url->getCode());
   		return $q->getOneOrNullResult();
	}

/*
	
	public function findByUrl(\BaseBundle\Controller\Helper\CruiseUrl $url) {
		$str = "SELECT c, s, pi, pr, cab, room, roomProp,  pl, rt, deck, rp, tariff
			FROM BaseBundle\Entity\CruiseCruise c 
			JOIN c.ship s
			LEFT JOIN c.programItems pi
			LEFT JOIN c.prices pr
			LEFT JOIN pi.place pl
			LEFT JOIN pr.cabin cab
			LEFT JOIN cab.rooms room
			LEFT JOIN room.roomId roomProp
			LEFT JOIN pr.rp_id rp
			LEFT JOIN pr.tariff tariff
			LEFT JOIN cab.rtId rt
			LEFT JOIN cab.deckId deck
			WHERE s.code = ?1 
			AND c.code = ?2
			
			ORDER BY deck.deckId , tariff.id , pi.date, pr.price";
   		$q = $this->_em->createQuery($str);
   		$q->setParameter(1, $url->getShipCode());
   		$q->setParameter(2, $url->getCode());
   		return $q->getSingleResult();
	}	


*/








	
	/*
	public function findByUrl(\BaseBundle\Controller\Helper\CruiseUrl $url) {
		$str = "SELECT c, s, pi, pr, cab, room, roomProp,  pl, rt, deck, rp, tariff
			FROM BaseBundle\Entity\CruiseCruise c 
			JOIN c.ship s
			LEFT JOIN s.cabins cab
			LEFT JOIN cab.prices pr
			LEFT JOIN c.programItems pi 

			LEFT JOIN pi.place pl

			LEFT JOIN cab.rooms room
			LEFT JOIN room.roomId roomProp
			LEFT JOIN pr.rp_id rp
			LEFT JOIN pr.tariff tariff
			LEFT JOIN cab.rtId rt
			LEFT JOIN cab.deckId deck
			WHERE s.code = ?1 AND c.code = ?2
			ORDER BY deck.deckId , tariff.id , pi.date, pr.price";
   		$q = $this->_em->createQuery($str);
   		$q->setParameter(1, $url->getShipCode());
   		$q->setParameter(2, $url->getCode());
   		return $q->getSingleResult();
	}
	*/


	public function findSpecial() {
		$str = "SELECT c, s, pr
			FROM BaseBundle\Entity\CruiseCruise c 
			JOIN c.ship s 
			LEFT JOIN c.prices pr
			WHERE c.specialoffer = ?1
			ORDER BY c.startdate ASC, s.title ASC";
		$q = $this->_em->createQuery($str);
		$q->setParameter(1, 1);		
   		return $q->getResult();
	}		
	
	public function findMinStartDate()
	{
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM BaseBundle:CruiseCruise c ORDER BY c.startdate ASC ')->setMaxResults(1)
            ->getOneOrNullResult();		
	}	
	public function findMaxStartDate()
	{
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM BaseBundle:CruiseCruise c ORDER BY c.enddate DESC ')->setMaxResults(1)
            ->getOneOrNullResult();		
	}
	
	public function findMinDays()
	{
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM BaseBundle:CruiseCruise c ORDER BY c.daycount ASC ')->setMaxResults(1)
            ->getOneOrNullResult();		
	}		
	public function findMaxDays()
	{
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM BaseBundle:CruiseCruise c ORDER BY c.daycount DESC ')->setMaxResults(1)
            ->getOneOrNullResult();		
	}		
	
}
