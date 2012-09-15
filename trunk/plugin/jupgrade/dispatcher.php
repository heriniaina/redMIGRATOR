<?php
/**
* @version $Id:
* @package Matware.jUpgradePro
* @copyright Copyright (C) 2005 - 2012 Matware. All rights reserved.
* @author Matias Aguirre
* @email maguirre@matware.com.ar
* @link http://www.matware.com.ar/
* @license GNU General Public License version 2 or later; see LICENSE
*/

defined('_JEXEC') or die;

/**
 * REST Request Dispatcher class 
 *
 * @package     Joomla.Platform
 * @subpackage  REST
 * @since       3.0
 */
class JRESTDispatcher
{
	/**
	 * @var    array  Associative array of parameters for the REST message.
	 * @since  3.0
	 */
	private $_parameters = array();

	/**
	 * @var    JUpgradeTable  JUpgradeTable object
	 * @since  3.0
	 */
	private $_table = array();
	
	/**
	 * 
	 *
	 * @return  boolean
	 *
	 * @since   3.0
	 */
	public function execute($parameters)
	{
		// Getting the database instance
		$db = JFactory::getDbo();	
	
		// Loading params
		$this->_parameters = $parameters;

		$task = $this->_parameters['HTTP_TASK'];
		$table = $this->_parameters['HTTP_TABLE'];
		$files = $this->_parameters['HTTP_FILES'];

		// Loading table
		if (isset($table)) {
			JTable::addIncludePath(JPATH_PLUGINS.'/system/jupgrade/table');
			$class = JUpgradeTable::getInstance($this->_parameters['HTTP_TABLE'], 'JUpgradeTable');
		}

		// Loading table
		if (isset($files)) {
			require_once JPATH_PLUGINS . '/system/jupgrade/files.php';
			$class = new JUpgradeFiles();
		}

		// Get the method name
		$method = 'get'.ucfirst($task);

		// Does the method exist?
		if (method_exists($class, $method))
		{
			return $class->$method();
		}
		else
		{
			return false;	
		}
	}
}
