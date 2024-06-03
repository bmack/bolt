<?php

defined('TYPO3') or die();

(function() {
    // Register autoloading for TypoScript for TYPO3 v11
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Core/TypoScript/TemplateService']['runThroughTemplatesPostProcessing']['bolt'] = \B13\Bolt\TypoScript\Loader::class . '->addSiteConfiguration';

    // v13 Page TS
    $pageTs = '
# Disable adding new sys_template records in list module
mod.web_list.deniedNewTables := addToList(sys_template)

# Hide TSconfig and tsconfig_includes fields when editing pages
TCEFORM.pages.TSconfig.disabled=1
TCEFORM.pages.tsconfig_includes.disabled=1
';

    if (isset($GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPageTSconfig'])) {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPageTSconfig'] .= $pageTs;
    } else {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['defaultPageTSconfig'] = $pageTs;
    }
})();
