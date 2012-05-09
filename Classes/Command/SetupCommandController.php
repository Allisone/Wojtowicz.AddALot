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
	 * @var \Wojtowicz\AddALot\Domain\Repository\PartRepository
	 * @FLOW3\Inject
	 */
	protected $partRepository;

	/**
	 * @var \Wojtowicz\AddALot\Domain\Repository\Card\TwoSideCardRepository
	 * @FLOW3\Inject
	 */
	protected $cardRepository;

	/**
	 * Creates cards
	 *
	 * @param integer $group_each
	 * @param integer $amount
	 * @param boolean $add_to_parts
	 * @return void
	 */
	public function createCards4Command($amount_total, $group_each, $add_to_parts){
		echo "Add to parts ? ".($add_to_parts ? "Yes" : "No")."\n";

		$time_start = microtime(true);
		$time_end = 0;

		$cards_per_part = 0;

		for($i = 0 ; $i < $amount_total ; $i++)
		{
			if($i % $group_each == 0){
				if($add_to_parts === true){
					echo "creating part ...\n";
					$part = new \Wojtowicz\AddALot\Domain\Model\Part();
					$part->setName('Part '.floor($i/$group_each));
					$this->partRepository->add($part);
				}else{
					echo "not creating part\n";
				}
				$cards_per_part = 0;
			}

			$cards_per_part++;

			$card = new \Wojtowicz\AddALot\Domain\Model\Card\TwoSideCard();

			$sideA = new \Wojtowicz\AddALot\Domain\Model\Card\Side\Side();
			$sideB = new \Wojtowicz\AddALot\Domain\Model\Card\Side\Side();

			$answerSideA = new \Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer();
			$answerSideB = new \Wojtowicz\AddALot\Domain\Model\Card\Side\TextAnswer\TextAnswer();

			$sideA->addAnswer($answerSideA);
			$sideB->addAnswer($answerSideB);

			$card->addSide($sideA);
			$card->addSide($sideB);

			if($add_to_parts === true){
				$part->addCard($card);
			}else{
				$this->cardRepository->add($card);
			}

			if($i % $group_each === $group_each - 1){ // we have n of n cards of a part, so persist now
				$this->persistenceManager->persistAll();
				$time_end = microtime(true);
				$time_diff = $time_end - $time_start;
				$part_no = floor($i/$group_each);
				echo "Part $part_no added $cards_per_part cards in $time_diff seconds\n";

				$time_start = microtime(true);
			}
		}
	}

}
?>