<?php
namespace SiteManager\View\Helper;

use Cake\View\Helper;

/**
 * SiteManager helper
 */
class SiteManagerHelper extends Helper
{
  public $helpers = ['CakeDC/Users.User'];
    /**
     * return the SiteManager menu
     * @return array
     */
    public function sitemgr_nav()
    {
        return [
          'links' => [
          	'Users'       => '/users/users',
          	'Permissions' => '/sitemgr/pages/permissions',
          	'divider1'    => 'divider',
            'Deliver'     => '/sitemgr/files',
            'Tables'      => '/sitemgr/tables',
            'divider2'    => 'divider',
            'Read Me'     => '/sitemgr/pages/readme',
            'Cake Status' => '/sitemgr/pages/cake_status'
          ],
          'dropdown' => 'Site Manager',
          'right' => true,
          'show' => 'admin'
        ];
    }

    public function user_nav()
    {
      $user = $this->User->f_name();
      if($user) {
        return [
          'links' => [
            'Profile' => '/profile',
            'divider1' => 'divider',
            'Logout' => '/logout'
          ],
          'dropdown' => $user,
          'right' => true,
          'show' => 'user'
        ];
      } else {
        return [
          'links' => ['Login' => '/login'],
          'right' => true,
          'show' => 'all'
        ];
      }
    }

	// CHANGES SINGLE LINE TO <BR>
	public function autoParagraph($text = null) {
		$ret_text = str_replace(PHP_EOL, '<br />', $text);
		return $ret_text;
	}
}
