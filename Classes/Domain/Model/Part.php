<?php
namespace Wojtowicz\AddALot\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Part
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Part {

	/**
	 * The name
	 * @var string
	 */
	protected $name;

	/**
	 * The cards
	 * @var \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard>
	 * @ORM\OneToMany(mappedBy="part",cascade={"persist"})
	 */
	protected $cards;


	/**
	 * Constructs this Chapter
	 *
	 * @return void
	 */
	public function __construct() {
		$this->cards = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get the Part's name
	 *
	 * @return string The Part's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Part's name
	 *
	 * @param string $name The Part's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Adds a card to this part
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\Card $card
	 * @return void
	 */
	public function addCard(\Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard $card) {
		$card->setPart($this);
		$this->cards->add($card);
	}

	/**
	 * Removes a card from this part
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\Card $card
	 * @return void
	 */
	public function removeCard(\Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard $card) {
		$this->cards->removeElement($card);
	}

	/**
	 * Returns all card in this part
	 *
	 * @return \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard> The cards of this part
	 */
	public function getCards() {
		return $this->cards;
	}

}
?>