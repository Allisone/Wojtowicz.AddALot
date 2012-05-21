<?php
namespace Wojtowicz\AddALot\Domain\Model\ElementB\ElementC;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A elementC
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class ElementC {

	/**
	 * The elementB
	 * @var \Wojtowicz\AddALot\Domain\Model\ElementB\ElementB
	 * @ORM\ManyToOne(inversedBy="elementCs")
	 */
	protected $elementB;

	/**
	 * The elementDs
	 * @var \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD>
	 * @ORM\OneToMany(mappedBy="elementC",cascade={"persist"})
	 */
	protected $elementDs;


	public function __construct(){
		$this->elementDs = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get the Back elementC's elementB
	 *
	 * @return \Wojtowicz\AddALot\Domain\Model\ElementB\ElementB The Back elementC's elementB
	 */
	public function getElementB() {
		return $this->elementB;
	}

	/**
	 * Sets this Back elementC's elementB
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementB\ElementB $elementB The Back elementC's elementB
	 * @return void
	 */
	public function setElementB(\Wojtowicz\AddALot\Domain\Model\ElementB\ElementB $elementB) {
		$this->elementB = $elementB;
	}

	/**
	 * Adds an elementD to this elementC
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD $elementD
	 * @return void
	 */
	public function addElementD(\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD $elementD) {
		$elementD->setElementC($this);
		$this->elementDs->add($elementD);
	}

	/**
	 * Removes an elementD from this elementC
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD $stackSet
	 * @return void
	 */
	public function removeElementD(\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD $elementD) {
		$this->elementDs->removeElement($elementD);
	}

	/**
	 * Get the Back elementC's elementDs
	 *
	 * @return \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD> The Back elementC's elementDs
	 */
	public function getElementDs() {
		return $this->elementDs;
	}


}
?>