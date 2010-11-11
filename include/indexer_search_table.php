<?php // no logging of the searches here!
/**
* This is the part of the TSEP logo & search field (on the left) and navigation for the admin (on the right) on the top of the pages in the administration files
*
* If the user enters something in the search file it will NOT be logged!
* @author Olaf Noehring
*
* following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate$
*  @lastedited $LastChangedBy$
*  $LastChangedRevision$
*
*/

if ( !isset($q) ) // prevent error in "input-type-name=q"-value-definition below
   $q = "";
?>
<div class="indexerSearchTableBlock">
        <div class="indexerSearchTableLeft">
                <a href="http://tsep.sourceforge.net/" target="_blank" title="<?php echo $tsep_lng['help_copyright']?>"><img src="../graphics/tsep.gif" alt="<?php echo $tsep_lng['tsep'];?>" width="310" height="61" border="0" /></a>
                <form method="get" action="../tsepsearch.php">
                        <input type="hidden" name="s" value="0" />
                        <input type="hidden" name="e" value="<?php echo $tsep_config['How_Many_Results'];?>" />
                        <input type="text" name="q" value="<?php print $q ?>" />
                        <input type="submit" value="<?php echo $tsep_lng['button_search'];?>" />
                </form>
        </div>
        <?php 
        /*
        <div class="indexerSearchTableAdminLinks">
                <div class="CurrentOrNewIndex"><a href="indexer.php"><?php echo $tsep_lng['create_new_index'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="indexer.php?showcompleteindex"><?php echo $tsep_lng['indexed_words'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="indexoverview.php"><?php echo $tsep_lng['index_overview_title'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="stopwords.php"><?php echo $tsep_lng['stopwords'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="logview.php"><?php echo $tsep_lng['logview_title'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="logviewstats.php"><?php echo $tsep_lng['logviewstats_title']; ?></a></div>
                <div class="CurrentOrNewIndex"><a href="configuration.php"><?php echo $tsep_lng['configuration'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="configcontentimages.php"><?php echo $tsep_lng['configure'] . "/" . $tsep_lng['manage'] . " " . $tsep_lng['contentimgs'];?></a></div>
        </div>
        */?>
        <div class="indexerSearchTableAdminLinks">
                <div class="CurrentOrNewIndex"><a href="<?php echo TSEP_CLIENT_ROOT?>/admin/admin_new/index.php?page=indexer"><?php echo $tsep_lng['create_new_index'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="indexer.php?showcompleteindex"><?php echo $tsep_lng['indexed_words'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="indexoverview.php"><?php echo $tsep_lng['index_overview_title'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="stopwords.php"><?php echo $tsep_lng['stopwords'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="logview.php"><?php echo $tsep_lng['logview_title'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="logviewstats.php"><?php echo $tsep_lng['logviewstats_title']; ?></a></div>
                <div class="CurrentOrNewIndex"><a href="configuration.php"><?php echo $tsep_lng['configuration'];?></a></div>
                <div class="CurrentOrNewIndex"><a href="configcontentimages.php"><?php echo $tsep_lng['configure'] . "/" . $tsep_lng['manage'] . " " . $tsep_lng['contentimgs'];?></a></div>
        </div>
</div>
<div class="breakerBoth">&nbsp;</div>
