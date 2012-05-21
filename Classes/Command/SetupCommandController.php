<?php
namespace Wojtowicz\AddALot\Command;

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * AddALot Command Setup Tools
 *
 * @FLOW3\Scope("singleton")
 */
class SetupCommandController extends \TYPO3\FLOW3\Cli\CommandController {

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\FLOW3\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @var \Wojtowicz\AddALot\Domain\Repository\ElementARepository
	 * @FLOW3\Inject
	 */
	protected $elementARepository;

	/**
	 * @var \Wojtowicz\AddALot\Domain\Repository\ElementB\ElementBRepository
	 * @FLOW3\Inject
	 */
	protected $elementBRepository;

	/**
	 * Creates elementBs
	 *
	 * @param integer $group_each
	 * @param integer $amount
	 * @param boolean $add_b_to_a
	 * @return void
	 */
	public function createElementsCommand($amount_total, $group_each, $add_b_to_a){
		echo "Add to elementAs ? ".($add_b_to_a ? "Yes" : "No")."\n";

		xdebug_break();
		$time_start = microtime(true);
		$time_end = 0;

		$elementBs_per_elementA = 0;

		for($i = 0 ; $i < $amount_total ; $i++)
		{
			if($i % $group_each == 0){
				if($add_b_to_a === true){
					echo "creating elementA ...\n";
					$elementA = new \Wojtowicz\AddALot\Domain\Model\ElementA();
					$elementA->setName('ElementA '.floor($i/$group_each));
				}else{
					echo "not creating elementA\n";
				}
				$elementBs_per_elementA = 0;
			}

			$elementBs_per_elementA++;

			$elementB = new \Wojtowicz\AddALot\Domain\Model\ElementB\ElementB();

			$elementC1 = new \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC();
			// $elementC2 = new \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementC();

			$elementB->addElementC($elementC1);
			// $elementB->addElementC($elementC2);

			$elementDElementC1 = new \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD();
			// $elementDElementC2 = new \Wojtowicz\AddALot\Domain\Model\ElementB\ElementC\ElementD\ElementD();

			$elementC1->addElementD($elementDElementC1);
			// $elementC2->addElementD($elementDElementC2);



			if($add_b_to_a === true){
				$elementA->addElementB($elementB);
			}else{
				$this->elementBRepository->add($elementB);
			}

			if($i % $group_each === $group_each - 1){ // we have n of n elementBs of a elementA, so persist now
				if($add_b_to_a){
					$this->elementARepository->add($elementA);
				}
//				xdebug_break();
				$this->persistenceManager->persistAll();
				$time_end = microtime(true);
				$time_diff = $time_end - $time_start;
				$elementA_no = floor($i/$group_each);
				if($add_b_to_a === true){
					echo "... elementA $elementA_no created, attached $elementBs_per_elementA elementBs and added elementA to elementA repository in $time_diff seconds\n";
				}else{
					echo "... elementA $elementA_no NOT created, added $elementBs_per_elementA elementBs to the elementB repository in $time_diff seconds\n";
				}

				$time_start = microtime(true);
			}
		}
	}

}
?>