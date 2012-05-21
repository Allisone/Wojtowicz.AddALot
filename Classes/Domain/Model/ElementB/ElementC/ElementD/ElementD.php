<?php
namespace Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Abstract text elementD
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class ElementD {

	/**
	 * The elementC
	 * @var \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC
	 * @ORM\ManyToOne(inversedBy="elementDs")
	 */
	protected $elementC;

	/**
	 * Get the abstract elementD's elementC
	 *
	 * @return \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC The abstract elementD's elementC
	 */
	public function getElementC() {
		return $this->elementC;
	}

	/**
	 * Sets this abstract elementD's elementC
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC $elementC The abstract elementD's elementC
	 * @return void
	 */
	public function setElementC(\Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC $elementC) {
		$this->elementC = $elementC;
	}


}
?>