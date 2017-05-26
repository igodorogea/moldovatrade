<?php
namespace IvanG\MdtradePackage\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Kay Petzold <kay.petzold@digitalwert.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;


/**
 * Content Controller
 *
 * @route off
 */
class ListController extends \TYPO3\CMS\Extensionmanager\Controller\ListController
{

    /**
     * Shows list of extensions present in the system
     *
     * @return void
     */
    public function indexAction()
    {
        $this->addComposerModeNotification();
        $availableAndInstalledExtensions = $this->sortExtensionsByStatus($this->listUtility->getAvailableAndInstalledExtensionsWithAdditionalInformation());
        $this->view->assign('extensions', $availableAndInstalledExtensions);
        $this->handleTriggerArguments();
    }
    
    /**
     * Sorts extensions in following order
     *   - Local installed
     *   - Uninstalled
     *   - System installed
     */
    private function sortExtensionsByStatus(array $extensions) {
        $systemExtensions = array();
        $localExtensions = array();
        $inactiveExtensions = array();
        foreach($extensions as $k => $v) {
            if ($v['installed']) {
                if ($v['type'] == 'System') {
                    $systemExtensions[$k] = $v;
                } else {
                    $localExtensions[$k] = $v;
                }
            } else {
                $inactiveExtensions[$k] = $v;
            }
        }
        
        return array_merge($localExtensions, $inactiveExtensions, $systemExtensions);
    }
}
