<?php
namespace Wojtowicz\AddALot\Domain\Model\Card\Side;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A side
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class Side {

	/**
	 * The card
	 * @var \Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard
	 * @ORM\ManyToOne(inversedBy="sides")
	 */
	protected $card;

	/**
	 * The answers
	 * @var \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer>
	 * @ORM\OneToMany(mappedBy="side",cascade={"persist"})
	 */
	protected $answers;


	public function __construct(){
		$this->answers = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get the Back side's card
	 *
	 * @return \Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard The Back side's card
	 */
	public function getCard() {
		return $this->card;
	}

	/**
	 * Sets this Back side's card
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard $card The Back side's card
	 * @return void
	 */
	public function setCard(\Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard $card) {
		$this->card = $card;
	}

	/**
	 * Adds an answer to this side
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer $answer
	 * @return void
	 */
	public function addAnswer(\Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer $answer) {
		$answer->setSide($this);
		$this->answers->add($answer);
	}

	/**
	 * Removes an answer from this side
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer $stackSet
	 * @return void
	 */
	public function removeAnswer(\Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer $answer) {
		$this->answers->removeElement($answer);
	}

	/**
	 * Get the Back side's answers
	 *
	 * @return \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer> The Back side's answers
	 */
	public function getAnswers() {
		return $this->answers;
	}


}
?>