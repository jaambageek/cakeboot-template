<?php
namespace SiteManager\View\Helper;

use Cake\View\Helper;
use \Datetime;

/**
 * SiteManager helper
 */
class SiteManagerHelper extends Helper
{
  public $helpers = ['CakeDC/Users.User', 'Text'];
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
            'New Request' => '/sitemgr/tasks',
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
		  // EMAIL ADDRESSESS - DO THIS FIRST BECAUSE IT ALSO REMOVES HTML
		$ret_text = $this->Text->autoLinkEmails($text);
		
		  // EOL to BR
		$ret_text = str_replace(PHP_EOL, '<br />', $ret_text);
		
		  // IF DATE IN PAST   - RETURNS YEARS
		  // IF DATE IN FUTURE - RETURNS DAYS, MONTHS, YEARS UNTIL
		  // FORMAT - {{MM/DD/YYYY}}
		preg_match_all('|{{([0-9]{2})/([0-9]{2})/([0-9]{4})}}|U', $ret_text, $matches);
		$i = 0;
		foreach($matches[0] as $match) {
			$d1 = new DateTime($matches[3][$i].'-'.$matches[1][$i].'-'.$matches[2][$i]);
			$d2 = new DateTime();
			
			if($d1 >= $d2) {
				$diff = $d2->diff($d1);
				$out = '';
				if($diff->y > 1)  $out .= $diff->y .' years, ';
				if($diff->y == 1) $out .= $diff->y .' year, ';
				if($diff->m > 1)  $out .= $diff->m .' months, ';
				if($diff->m == 1) $out .= $diff->m .' month, ';
				if($out != '') $out .= 'and ';
				if($diff->d == 1) $out .= $diff->d .' day, ';
				else $out .= $diff->d .' days';
				$ret_text = preg_replace('|'. $match .'|', $out, $ret_text);
			} else {
				$diff = $d1->diff($d2);
				$ret_text = preg_replace('|'. $match .'|', $diff->y, $ret_text);
			}
			$i++;
		}
		
		  // LINKS WITH TITLE - {{TITLE::ANYURLHERE}}
		$ret_text = preg_replace("/{{(.+)::(.+)}}/U", '<a href="$2" target="_blank">$1</a>', $ret_text);
		
		  // LINKS WITHOUT TITLE - {{ANYURLHERE}}
		$ret_text = preg_replace("/{{(.+)}}/U", '<a href="$1" target="_blank">$1</a>', $ret_text);
		
		return $ret_text;
	}
}
