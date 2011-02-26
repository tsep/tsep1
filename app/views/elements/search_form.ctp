<?php 
        echo $form->create(null, array(
          'url' => array(
            'controller'=>'indices', 
            'action'=>'search'
          ),
          'type' => 'get'
        ));
      ?>
        <fieldset>
        <input type="text" name="q" id="search-box" />
        <input type="submit" id="search-submit" value="<?php __('Search'); ?>" />
        </fieldset>
<?php echo $form->end(); ?>