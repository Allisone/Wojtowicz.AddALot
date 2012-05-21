<?php
namespace Wojtowicz\AddALot\Domain\Model\ElementB;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Abstract elementB
 *
 * @FLOW3\Entity
 * @FLOW3\Scope("prototype")
 */
class ElementB {

	/**
	 * The elementA
	 * @var \Wojtowicz\AddALot\Domain\Model\ElementA
	 * @ORM\ManyToOne(inversedBy="elementBs")
	 */
	protected $elementA;

	/**
	 * The elementD page a
	 * @var \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC>
	 * @ORM\OneToMany(cascade={"persist"},mappedBy="elementB")
	 * @ORM\JoinColumn(onDelete="CASCADE")
	 */
	protected $elementCs;


	/**
	 * Constructs this Chapter
	 *
	 * @return void
	 */
	public function __construct() {
		$this->elementCs = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Returns all elementCs in this elementB
	 *
	 * @return \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC> The elementCs of this elementB
	 */
	public function getElementCs() {
		return $this->elementCs;
	}

	/**
	 * Sets the elementCs of this elementB
	 *
	 * @param \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC> $elementCs The elementCs
	 * @return void
	 */
	public function setElementCs(\Doctrine\Common\Collections\Collection $elementCs) {
		$this->elementCs = $elementCs;
	}

	/**
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC $elementC
	 */
	public function addElementC(\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC $elementC){
		$this->elementCs->add($elementC);
		$elementC->setElementB($this);
	}

	/**
	 * Get the ElementB's elementA
	 *
	 * @return \Wojtowicz\AddALot\Domain\Model\ElementA The ElementB's elementA
	 */
	public function getElementA() {
		return $this->elementA;
	}

	/**
	 * Sets this ElementB's elementA
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementA $elementA The ElementB's elementA
	 * @return void
	 */
	public function setElementA(\Wojtowicz\AddALot\Domain\Model\ElementA $elementA) {
		$this->elementA = $elementA;
	}

}
?>