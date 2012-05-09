<?php
namespace Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Abstract text answer
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class TextAnswer {

	/**
	 * The side
	 * @var \Wojtowicz\AddALot\Domain\Model\Card\Side\Side
	 * @ORM\ManyToOne(inversedBy="answers")
	 */
	protected $side;

	/**
	 * Get the abstract answer's side
	 *
	 * @return \Wojtowicz\AddALot\Domain\Model\Card\Side\Side The abstract answer's side
	 */
	public function getSide() {
		return $this->side;
	}

	/**
	 * Sets this abstract answer's side
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\Card\Side\Side $side The abstract answer's side
	 * @return void
	 */
	public function setSide(\Wojtowicz\AddALot\Domain\Model\Card\Side\Side $side) {
		$this->side = $side;
	}


}
?>