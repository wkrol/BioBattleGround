<?php

require 'om/BaseUserPeer.php';

/**
 * Skeleton subclass for performing query and update operations on the 'user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    biobattleground
 */
class UserPeer extends BaseUserPeer {
	public static function loguj($nazwa_uz, $haslo) {
		$tmp = new Criteria();
		$tmp->add(UserPeer::LOGIN, $nazwa_uz);
		$tmp->add(UserPeer::PASSWORD, $haslo);
		$login = UserPeer::doSelect($tmp);
		if (count($login) == 0) {
			return false;
		} else {
			return true;
		}
	}
} // UserPeer
