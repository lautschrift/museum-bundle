<?php

 /**
  * Dynamically add parent table and set getAlias-Function to find CE's in this module
  */
if (\Input::get('do') == 'palafittes_museum') {
    $GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_museum';
    $GLOBALS['TL_DCA']['tl_content']['fields']['cteAlias']['options_callback'] = array('tl_museum', 'getAlias');
}
