<?php
namespace Wojtowicz\AddALot\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A ElementA
 *
 * @FLOW3\Scope("prototype")
 * @FLOW3\Entity
 */
class ElementA {

	/**
	 * The name
	 * @var string
	 */
	protected $name;

	/**
	 * The elementBs
	 * @var \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\ElementB\ElementB>
	 * @ORM\OneToMany(mappedBy="elementA",cascade={"persist"})
	 */
	protected $elementBs;


	/**
	 * Constructs this Chapter
	 *
	 * @return void
	 */
	public function __construct() {
		$this->elementBs = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Get the ElementA's name
	 *
	 * @return string The ElementA's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this ElementA's name
	 *
	 * @param string $name The ElementA's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Adds a elementB to this elementA
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementB $elementB
	 * @return void
	 */
	public function addElementB(\Wojtowicz\AddALot\Domain\Model\ElementB\ElementB $elementB) {
		$elementB->setElementA($this);
		$this->elementBs->add($elementB);
	}

	/**
	 * Removes a elementB from this elementA
	 *
	 * @param \Wojtowicz\AddALot\Domain\Model\ElementB $elementB
	 * @return void
	 */
	public function removeElementB(\Wojtowicz\AddALot\Domain\Model\ElementB\ElementB $elementB) {
		$this->elementBs->removeElement($elementB);
	}

	/**
	 * Returns all elementB in this elementA
	 *
	 * @return \Doctrine\Common\Collections\Collection<\Wojtowicz\AddALot\Domain\Model\ElementB\ElementB> The elementBs of this elementA
	 */
	public function getElementBs() {
		return $this->elementBs;
	}

}
?>