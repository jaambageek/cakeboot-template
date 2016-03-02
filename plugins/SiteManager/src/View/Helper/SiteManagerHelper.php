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

	// ESCAPES HTML, CHANGES SINGLE LINE TO <BR> AND DOUBLE LINE TO <P>
	// USER CAN SUPPLY A CLASS FOR THE <P> ELELEMNTS.
	public function autoParagraph($text = null, $class = null) {
		//$text = h($text); // SANITIZE THE PARAGRAPH
		$paragraphs = explode(PHP_EOL.PHP_EOL, $text);
		
		$ret_text = '';
		foreach($paragraphs as $paragraph) {
			$ret_text .= '<p class="'.$class.'">'. $paragraph .'</p>';
		}
		
		$ret_text = str_replace(PHP_EOL, '<br />', $ret_text);
		return $ret_text;
	}
}
