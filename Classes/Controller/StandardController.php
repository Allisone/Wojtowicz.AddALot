<?php
namespace Wojtowicz\AddALot\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Wojtowicz.AddALot".          *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Standard controller for the Wojtowicz.AddALot package 
 *
 * @FLOW3\Scope("singleton")
 */
class StandardController extends \TYPO3\FLOW3\Mvc\Controller\ActionController {

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}

}

?>