<?php
/**
* Interface with Indexing Profiles
* 
* @author geoffreyfishing
*
* The following will be filled automatically by SubVersion!
* Do not change by hand!
*  $LastChangedDate: $
*  $LastChangedBy:  $
*  $LastChangedRevision: $
*
*/



class IProfile {
								//Don't be an idiot! Notice that their
	public $profileName;			//is not an "s" at the end of this class's
	public $profileId;				//name and that their is an "s" at the end
								//of the name of the class below.
}

class IProfiles {
	
	/**
	 * getAllProfiles
	 * 
	 * Gets an array of all the Indexing Profiles
	 * 
	 * @return array An array of all the profiles
	 */
	static function getAllProfiles() {
		
		$pdo = db::PDO();
		
		$return = array();
		
		$handle = $pdo->query("SELECT * FROM ".db::$prefix."iprofile");
		
		$handle->execute();
		
		while ($row = $handle->fetchObject()) {
			
			$tmp = new IProfile();
			
			$tmp->profileName 	= $row->profilename;
			$tmp->profileId		= $row->idiprofile;
			
			array_push($return, $tmp);
			
		}
		
		return $return;
		
	}
	/**
	 * getProfileById
	 * Returns the name of the profile
	 * @param string $name The ID of the profile
	 */
	static function getProfileById($id) {
		
		$pdo = db::PDO();
				
		$handle = $pdo->query("SELECT * FROM ".db::$prefix."iprofile WHERE idiprofile = ?");
		
		$handle->execute(array($name));
		
		$row = $handle->fetchObject();
				
		$tmp = new IProfile();

		$tmp->profileId = $row->idiprofile;
		$tmp->profileName = $row->profilename;
	}
	
}