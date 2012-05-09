<?php
namespace Wojtowicz\AddALot\Domain\Model\Card;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Abstract card
 *
 * @FLOW3\Entity
 * @FLOW3\Scope("prototype")
 */
class TwoSideCard {

	/**
	 * The part
	 * @var \Wojtowicz\AddALot\Domain\Model\Part
	 * @ORM\ManyToOne(inversedBy="cards")
	 */
	protected $part;

	/**
	 * The answer page a
	 * @var \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\Card\Side\Side>
	 * @ORM\OneToMany(cascade={"persist"},mappedBy="card")
	 * @ORM\JoinColumn(onDelete="CASCADE")
	 */
	protected $sides;


	/**
	 * Constructs this Chapter
	 *
	 * @return void
	 */
	public function __construct() {
		$this->sides = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Returns all sides in this card
	 *
	 * @return \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\Card\Side\Side> The sides of this card
	 */
	public function getSides() {
		return $this->sides;
	}

	/**
	 * Sets the sides of this card
	 *
	 * @param \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\Card\Side\Side> $sides The sides
	 * @return void
	 */
	public function setSides(\Doctrine\Common\Collections\Collection $sides) {
		$this->sides = $sides;
	}

	/**
	 * @param \Wojtowicz\AddALot\Domain\Model\Card\Side\Side $side
	 */
	public function addSide(\Wojtowicz\AddALot\Domain\Model\Card\Side\Side $side){
		$this->sides->add($side);
		$side->setCard($this);
	}

	/**
	 * Get the TwoSideCard's part
	 *
	 * @return \Wojtowicz\AddALot\Domain\Model\Part The TwoSideCard's part
	 */
	public function getPart() {
		return $this->part;
	}

	/**
	 * Sets this TwoSideCard's part
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\Part $part The TwoSideCard's part
	 * @return void
	 */
	public function setPart(\Wojtowicz\AddALot\Domain\Model\Part $part) {
		$this->part = $part;
	}

}
?>