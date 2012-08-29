<?php
/**
 * jUpgrade
 *
 * @version		$Id$
 * @package		MatWare
 * @subpackage	com_jupgradepro
 * @copyright	Copyright 2006 - 2011 Matias Aguire. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 * @author		Matias Aguirre <maguirre@matware.com.ar>
 * @link		http://www.matware.com.ar
 */

// No direct access.
defined('_JEXEC') or die;

$document	= JFactory::getDocument();

$version = "v{$this->version}";

// get params
$params	= $this->params;

$m = $params->get('method');

$method = isset($m) ? $m : 'rest_individual';

// get document to add scripts
$document	= JFactory::getDocument();
$document->addScript('components/com_jupgradepro/js/dwProgressBar.js');
$document->addScript('components/com_jupgradepro/js/Base64.js');
$document->addScript("components/com_jupgradepro/js/migrate.{$method}.js");
$document->addScript('components/com_jupgradepro/js/requestmultiple.js');
$document->addStyleSheet("components/com_jupgradepro/css/jupgrade.css");
?>
<script type="text/javascript">

window.addEvent('domready', function() {


	/* Init jUpgrade */
	var jupgrade = new jUpgrade({
    skip_templates: <?php echo $params->get("skip_templates") ? $params->get("skip_templates") : 0; ?>,
    skip_extensions: <?php echo $params->get("skip_extensions") ? $params->get("skip_extensions") : 0; ?>,
    positions: <?php echo $params->get("positions") ? $params->get("positions") : 0; ?>,
    debug_php: <?php echo $params->get("debug") ? $params->get("debug") : 0; ?>,
    debug_js: <?php echo $params->get("debug") ? $params->get("debug") : 0; ?>
	});

});

</script>

<table width="100%">
	<tbody>
		<tr>
			<td width="100%" valign="top" align="center">

				<div id="update">
					<br /><img src="components/com_jupgradepro/images/update.png" align="middle" border="0"/><br />
					<h2><?php echo JText::_('START UPGRADE'); ?></h2><br />
				</div>

				<div id="checks">
					<p class="text"><?php echo JText::_('Checking and cleaning...'); ?></p>
					<div id="pb0"></div>
					<div><small><i><span id="checkstatus"><?php echo JText::_('Preparing for check...'); ?></span></i></small></div>
				</div>

				<div id="migration">
					<p class="text"><?php echo JText::_('Upgrading progress...'); ?></p>
					<div id="pb4"></div>
					<div><small><i><span id="status"><?php echo JText::_('Preparing for migration'); ?></span></i></small></div>
					<div id="counter">
						<i><small><b><span id="currItem">0</span></b> items /
						<b><span id="totalItems">0</span></b> items</small></i>
					</div>
				</div>

				<div id="templates">
					<p class="text"><?php echo JText::_('Copying templates...'); ?></p>
					<div id="pb5"></div>
				</div>

				<div id="files">
					<p class="text"><?php echo JText::_('Copying images/media files...'); ?></p>
					<div id="pb6"></div>
				</div>

				<div id="extensions">
					<p class="text"><?php echo JText::_('Upgrading 3rd extensions...'); ?></p>
					<div id="pb7"></div>
					<div><small><i><span id="status_ext"><?php echo JText::_('Preparing for 3rd extensions migration'); ?></span></i></small></div>
				</div>

				<div id="done">
					<h2 class="done"><?php echo JText::_('Migration Successful!'); ?></h2>
				</div>
				<div id="info">
					<div id="info_version"><?php echo JText::_('jUpgradePro'); ?> <?php echo JText::_('Version').' <b>'.$this->version.'</b>'; ?></div>
					<div id="info_thanks">
						<p>
							<?php echo JText::_('Developed by'); ?> <i><a href="http://www.matware.com.ar/">Matware &#169;</a></i>  Copyleft 2006-2012<br />
							Licensed as <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html"><i>GNU General Public License v2</i></a><br />
						</p>
						<p>
							<a href="http://redcomponent.com/jupgrade">Project Site</a> /
							<a href="http://redcomponent.com/forum/92-jupgrade">Project Community</a> /
							<a href="http://redcomponent.com/forum/92-jupgrade/102880-jupgrade-faq">FAQ</a><br />
						</p>
					</div>
				</div>

				<div>
					<div id="debug"></div>
				</div>

			</td>
		</tr>
	</tbody>
</table>

<form action="index.php?option=com_jupgradepro" method="post" name="adminForm">
	<input type="hidden" name="option" value="com_jupgradepro" />
	<input type="hidden" name="task" value="" />
</form>
