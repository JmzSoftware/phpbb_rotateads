<?php
/**
 *
 * Jmz Rotate Ads. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2016, Jmz Software, https://jmzsoftware.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace jmz\rotateads\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Jmz Rotate Ads Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_footer_after'	=> 'showads',
		);
	}

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

        /** @var \phpbb\user */
	protected $user;

        /** @var string phpBB root path */
	protected $phpbb_root_path;

        /** @var string phpEx */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\controller\helper	$helper		Controller helper object
	 * @param \phpbb\template\template	$template	Template object
	 */
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, $phpbb_root_path, $php_ext)
	{
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;
                $this->root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
                if (!function_exists('group_memberships'))
		{
			include($this->root_path . 'includes/functions_user.' . $this->php_ext);
		}
	}

	public function showads($event) {
		$groups = group_memberships(false,$this->user->data['user_id'], false);
		if (sizeof($groups))
		{
			foreach ($groups as $grouprec)
			{
				$this->template->assign_vars(array(
					'S_GROUP_' . $grouprec['group_id'] => true
				));
			}
		}
		$this->template->assign_vars(array(
			'S_AD' => rand(1, 2)
		));
	}
}
