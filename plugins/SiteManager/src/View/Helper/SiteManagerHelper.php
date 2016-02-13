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
            'Deliver' => '/sitemgr/files',
            'Tables' => '/sitemgr/tables',
            'Read Me' => '/sitemgr/pages/readme',
            'Cake Status' => '/sitemgr/pages/cake_status'
          ],
          'dropdown' => 'Site Manager',
          'right' => true,
          'debug' => true
        ];
    }

    public function user_nav()
    {
      $user = $this->User->f_name();
      if($user) {
        return [
          'links' => [
            'Profile' => 'profile',
            'Logout' => 'logout'
          ],
          'dropdown' => $user,
          'right' => true
        ];
      } else {
        return [
          'links' => ['Login' => 'login'],
          'right' => true
        ];
      }
    }
}
