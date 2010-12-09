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
        <input type="text" name="q" id="search-text" size="15" />
        <input type="submit" id="search-submit" value="GO" />
        </fieldset>
<?php echo $form->end(); ?>