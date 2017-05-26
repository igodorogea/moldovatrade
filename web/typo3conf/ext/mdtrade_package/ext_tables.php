<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (TYPO3_MODE=="BE")   {
    /**
     * Custom BE CSS
     */
    $TBE_STYLES['stylesheet2'] = '../typo3conf/ext/mdtrade_package/Resources/Public/Css/Backend.css';
}
