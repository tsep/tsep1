<?php
/**
* change the color (alternating color) for long list, every entry to the "other" color
*
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/

if ($tsep_config['Color'] == $tsep_config['Color_1']) {
                $tsep_config['Color'] = $tsep_config['Color_2'];
        } else {
                $tsep_config['Color'] = $tsep_config['Color_1'];
        }

?>
