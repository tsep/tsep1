<?php

/**
 * Updates the Database
 */
function update_database () {
    
        $db =& ConnectionManager::getDataSource('default');

        $schema =& new CakeSchema(array('name'=>'app'));
                                
        $new_schema = $schema->load();        
        $old_schema = $schema->read();
        
        $compare = $schema->compare($old_schema, $new_schema);

        $contents = array();

        foreach ($compare as $table => $changes) {
            $contents[$table] = $db->alterSchema(array($table => $changes), $table);
        }


        if (!empty($contents)) {
            
            $contents = implode(';', $contents);
            
            $db->execute($contents);
        }
        
        return true;

}