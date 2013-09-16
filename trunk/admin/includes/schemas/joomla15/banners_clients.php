<?php
/**
* redMigrator
*
* @version $Id:
* @package redMigrator
* @copyright Copyright (C) 2004 - 2013 Matware. All rights reserved.
* @author Matias Aguirre
* @email maguirre@matware.com.ar
* @link http://www.matware.com.ar/
* @license GNU General Public License version 2 or later; see LICENSE
*/
/**
 * Upgrade class for banners clients 
 *
 * @package		MatWare
 * @subpackage	com_redmigrator
 * @since		2.5.2
 */
class redMigratorBannersClients extends redMigrator
{
	/**
	 * Setting the conditions hook
	 *
	 * @return	void
	 * @since	3.0.0
	 * @throws	Exception
	 */
	public static function getConditionsHook()
	{
		$conditions = array();
		
		$conditions['select'] = '`cid` AS id, `name`, 1 AS `state`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`';
		
		$conditions['where'] = array();
		
		return $conditions;
	}	
}
