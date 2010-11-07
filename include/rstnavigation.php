<?php
/**
* to use this recordset navigation in each file where we need it (code-recycle)
*
* @param string $recordsetName
* @param string $queryString
* @param string $currentPage
* @param string $totalPages
* @param string $pageNum
* @return array ($queryString, $currentPage, $totalPages, $pageNum)
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: 2005-06-11 18:55:44 +0200 (Sa, 11 Jun 2005) $
*  @lastedited $LastChangedBy: toon $
*  $LastChangedRevision: 134 $
*
*/


/**
* to use this recordset navigation in each file where we need it (code-recycle)
*
* @param string $recordsetName
* @param string $queryString
* @param string $currentPage
* @param string $totalPages
* @param string $pageNum
* @return array ($queryString, $currentPage, $totalPages, $pageNum)
* @author Olaf Noehring
* @lastedited Olaf Noehring
*/
function RSTNavigation($recordsetName, $queryString, $currentPage, $totalPages, $pageNum)
{
        global $tsep_config, $tsep_lng;

        ?>

        <div class="RSTNavigationBlock">
                <div class="RSTNavigation">
                        <?php if ($pageNum > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_$recordsetName=%d%s", $currentPage, 0, $queryString); ?>" title="<?php echo $tsep_lng['help_first_page']; ?>">&lt;&lt;</a>
                        <?php } // Show if not first page ?>
                </div>

                <div class="RSTNavigation">
                        <?php if ($pageNum > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_$recordsetName=%d%s", $currentPage, max(0, $pageNum - 1), $queryString); ?>" title="<?php echo $tsep_lng['help_previous_page']; ?>">&lt;</a>
                        <?php } // Show if not first page ?>
                </div>

                <div class="RSTNavigation">
                        <?php if ($pageNum < $totalPages) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_$recordsetName=%d%s", $currentPage, min($totalPages, $pageNum + 1), $queryString); ?>" title="<?php echo $tsep_lng['help_next_page']; ?>">&gt;</a>
                        <?php } // Show if not last page ?>
                </div>

                <div class="RSTNavigation">
                        <?php if ($pageNum < $totalPages) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_$recordsetName=%d%s", $currentPage, $totalPages, $queryString); ?>" title="<?php echo $tsep_lng['help_last_page']; ?>">&gt;&gt;</a>
                        <?php } // Show if not last page ?>
                </div>
          </div>
        <?php

        return array
                        (       //we can only return 1 value from a function - so let it be an array
                                $queryString ,
                                $currentPage ,
                                $totalPages ,
                                $pageNum
                        );

}
?>
