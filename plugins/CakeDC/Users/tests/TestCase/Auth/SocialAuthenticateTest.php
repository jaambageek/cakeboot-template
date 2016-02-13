<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace CakeDC\Users\Test\TestCase\Auth;

use Cake\ORM\TableRegistry;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Event\EventManager;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\TestSuite\TestCase;
use CakeDC\Users\Exception\AccountNotActiveException;
use CakeDC\Users\Exception\MissingEmailException;
use CakeDC\Users\Exception\UserNotActiveException;
use ReflectionClass;

class SocialAuthenticateTest extends TestCase
{
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.CakeDC/Users.social_accounts',
        'plugin.CakeDC/Users.users'
    ];

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $request = new Request();
        $response = new Response();

        $this->Table = TableRegistry::get('CakeDC/Users.Users');

        $this->Token = $this->getMockBuilder('AccessToken')
            ->setMethods(['getToken', 'getExpires'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->controller = $this->getMock(
            'Cake\Controller\Controller',
            null,
            [$request, $response]
        );
        $this->Request = $request;
        $this->Registry = new ComponentRegistry($this->controller);

        $this->SocialAuthenticate = $this->getMockBuilder('CakeDC\Users\Auth\SocialAuthenticate')
            ->setMethods(['_authenticate', '_getProviderName', '_mapUser', '_socialLogin', 'dispatchEvent'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->SocialAuthenticate, $this->controller);
    }

    /**
     * Test getUser
     *
     * @dataProvider providerGetUser
     */
    public function testGetUserAuth($rawData, $mapper)
    {
         $this->SocialAuthenticate->expects($this->once())
         ->method('_authenticate')
         ->with($this->Request)
         ->will($this->returnValue($rawData));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_getProviderName')
            ->will($this->returnValue('facebook'));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_mapUser')
            ->will($this->returnValue($mapper));

        $user =  $this->Table->get('00000000-0000-0000-0000-000000000002');
        $this->SocialAuthenticate->expects($this->once())
            ->method('_socialLogin')
            ->will($this->returnValue($user));


        $result = $this->SocialAuthenticate->getUser($this->Request);
        $this->assertTrue($result['active']);
        $this->assertEquals('00000000-0000-0000-0000-000000000002', $result['id']);
    }

    /**
     * Provider for getUser test method
     *
     */
    public function providerGetUser()
    {
        return [
            [
                'rawData' => [
                    'token' => 'token',
                    'id' => 'reference-2-1',
                    'name' => 'User S',
                    'first_name' => 'user',
                    'last_name' => 'second',
                    'email' => 'userSecond@example.com',
                    'cover' => [
                        'id' => 'reference-2-1'
                    ],
                    'gender' => 'female',
                    'locale' => 'en_US',
                    'link' => 'link',
                ],
                'mappedData' =>  [
                    'id' => 'reference-2-1',
                    'username' => null,
                    'full_name' => 'User S',
                    'first_name' => 'user',
                    'last_name' => 'second',
                    'email' => 'userSecond@example.com',
                    'link' => 'link',
                    'bio' => null,
                    'locale' => 'en_US',
                    'validated' => true,
                    'credentials' => [
                        'token' => 'token',
                        'secret' => null,
                        'expires' => 1458423682
                    ],
                    'raw' => [

                    ],
                    'provider' => 'Facebook'
                ],
            ]

        ];
    }

    /**
     * Test getUser
     *
     */
    public function testGetUserSessionData()
    {
        $user = ['username' => 'username', 'email' => 'myemail@test.com'];
        $this->SocialAuthenticate = $this->getMockBuilder('CakeDC\Users\Auth\SocialAuthenticate')
            ->setMethods(['_authenticate', '_getProviderName', '_mapUser', '_touch'])
            ->disableOriginalConstructor()
            ->getMock();

        $session = $this->getMock('Cake\Network\Session', ['read', 'delete']);
        $session->expects($this->once())
            ->method('read')
            ->with('Users.social')
            ->will($this->returnValue($user));

        $session->expects($this->once())
            ->method('delete')
            ->with('Users.social');

        $this->Request = $this->getMock('Cake\Network\Request', ['session']);
        $this->Request->expects($this->any())
            ->method('session')
            ->will($this->returnValue($session));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_touch')
            ->will($this->returnValue($user));

        $this->SocialAuthenticate->getUser($this->Request);
    }

    /**
     * Test getUser
     *
     * @dataProvider providerGetUser
     */
    public function testGetUserNotEmailProvided($rawData, $mapper)
    {
        $this->SocialAuthenticate->expects($this->once())
            ->method('_authenticate')
            ->with($this->Request)
            ->will($this->returnValue($rawData));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_getProviderName')
            ->will($this->returnValue('facebook'));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_mapUser')
            ->will($this->returnValue($mapper));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_socialLogin')
            ->will($this->throwException(new MissingEmailException('missing email')));

        $event = new Event('ExceptionEvent');
        $event->result = 'result';

        $this->SocialAuthenticate->expects($this->once())
            ->method('dispatchEvent')
            ->will($this->returnValue($event));

        $result = $this->SocialAuthenticate->getUser($this->Request);
        $this->assertEquals($result, 'result');
    }

    /**
     * Test getUser
     *
     * @dataProvider providerGetUser
     */
    public function testGetUserNotActive($rawData, $mapper)
    {
        $this->SocialAuthenticate->expects($this->once())
            ->method('_authenticate')
            ->with($this->Request)
            ->will($this->returnValue($rawData));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_getProviderName')
            ->will($this->returnValue('facebook'));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_mapUser')
            ->will($this->returnValue($mapper));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_socialLogin')
            ->will($this->throwException(new UserNotActiveException('user not active')));

        $event = new Event('ExceptionEvent');
        $event->result = 'result';

        $this->SocialAuthenticate->expects($this->once())
            ->method('dispatchEvent')
            ->will($this->returnValue($event));

        $result = $this->SocialAuthenticate->getUser($this->Request);
        $this->assertEquals($result, 'result');
    }

    /**
     * Test getUser
     *
     * @dataProvider providerGetUser
     */
    public function testGetUserNotActiveAccount($rawData, $mapper)
    {
        $this->SocialAuthenticate->expects($this->once())
            ->method('_authenticate')
            ->with($this->Request)
            ->will($this->returnValue($rawData));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_getProviderName')
            ->will($this->returnValue('facebook'));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_mapUser')
            ->will($this->returnValue($mapper));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_socialLogin')
            ->will($this->throwException(new AccountNotActiveException('user not active')));

        $event = new Event('ExceptionEvent');
        $event->result = 'result';

        $this->SocialAuthenticate->expects($this->once())
            ->method('dispatchEvent')
            ->will($this->returnValue($event));

        $result = $this->SocialAuthenticate->getUser($this->Request);
        $this->assertEquals($result, 'result');
    }

    /**
     * Test getUser
     *
     * @dataProvider providerTwitter
     * @expectedException CakeDC\Users\Exception\MissingEmailException
     */
    public function testGetUserNotEmailProvidedTwitter($rawData, $mapper)
    {
        $this->SocialAuthenticate->expects($this->once())
            ->method('_authenticate')
            ->with($this->Request)
            ->will($this->returnValue($rawData));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_getProviderName')
            ->will($this->returnValue('twitter'));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_mapUser')
            ->will($this->returnValue($mapper));

        $this->SocialAuthenticate->expects($this->once())
            ->method('_socialLogin')
            ->will($this->throwException(new MissingEmailException('missing email')));

        $this->SocialAuthenticate->getUser($this->Request);
    }

    /**
     * Provider for getUser test method
     *
     */
    public function providerTwitter()
    {
        return [
            [
                'rawData' => [
                    'token' => 'token',
                    'id' => 'reference-2-1',
                    'name' => 'User S',
                    'first_name' => 'user',
                    'last_name' => 'second',
                    'email' => 'userSecond@example.com',
                    'cover' => [
                        'id' => 'reference-2-1'
                    ],
                    'gender' => 'female',
                    'locale' => 'en_US',
                    'link' => 'link',
                ],
                'mappedData' =>  [
                    'id' => 'reference-2-1',
                    'username' => null,
                    'full_name' => 'User S',
                    'first_name' => 'user',
                    'last_name' => 'second',
                    'email' => 'userSecond@example.com',
                    'link' => 'link',
                    'bio' => null,
                    'locale' => 'en_US',
                    'validated' => true,
                    'credentials' => [
                        'token' => 'token',
                        'secret' => null,
                        'expires' => 1458423682
                    ],
                    'raw' => [

                    ],
                    'provider' => 'Twitter'
                ],
            ]

        ];
    }

    /**
     * Test _socialLogin
     *
     * @dataProvider providerMapper
     */
    public function testSocialLogin()
    {
        $this->SocialAuthenticate = $this->getMockBuilder('CakeDC\Users\Auth\SocialAuthenticate')
            ->disableOriginalConstructor()
            ->getMock();
        $reflectedClass = new ReflectionClass($this->SocialAuthenticate);
        $socialLogin = $reflectedClass->getMethod('_socialLogin');
        $socialLogin->setAccessible(true);
        $data = [
            'id' => 'reference-2-1',
            'provider' => 'Facebook'
        ];
        $result = $socialLogin->invoke($this->SocialAuthenticate, $data);
        $this->assertEquals($result->id, '00000000-0000-0000-0000-000000000002');
        $this->assertTrue($result->active);
    }

    /**
     * Test _mapUser
     *
     * @dataProvider providerMapper
     */
    public function testMapUser($data, $mappedData)
    {
        $data['token'] = $this->Token;
        $this->SocialAuthenticate = $this->getMockBuilder('CakeDC\Users\Auth\SocialAuthenticate')
            ->disableOriginalConstructor()
            ->getMock();

        $reflectedClass = new ReflectionClass($this->SocialAuthenticate);
        $mapUser = $reflectedClass->getMethod('_mapUser');
        $mapUser->setAccessible(true);

        $this->Token->expects($this->once())
            ->method('getToken')
            ->will($this->returnValue('token'));

        $this->Token->expects($this->once())
            ->method('getExpires')
            ->will($this->returnValue(1458510952));

        $result = $mapUser->invoke($this->SocialAuthenticate, 'Facebook', $data);
        unset($result['raw']);
        $this->assertEquals($result, $mappedData);
    }

    /**
     * Provider for _mapUser test method
     *
     */
    public function providerMapper()
    {
        return [
                [
                'rawData' =>  [
                    'id' => 'my-facebook-id',
                    'name' => 'My name.',
                    'first_name' => 'My first name',
                    'last_name' => 'My lastname.',
                    'email' => 'myemail@example.com',
                    'gender' => 'female',
                    'locale' => 'en_US',
                    'link' => 'https://www.facebook.com/app_scoped_user_id/my-facebook-id/',
                ],
                'mappedData' =>  [
                    'id' => 'my-facebook-id',
                    'username' => null,
                    'full_name' => 'My name.',
                    'first_name' => 'My first name',
                    'last_name' => 'My lastname.',
                    'email' => 'myemail@example.com',
                    'avatar' => 'https://graph.facebook.com/my-facebook-id/picture?type=normal',
                    'gender' => 'female',
                    'link' => 'https://www.facebook.com/app_scoped_user_id/my-facebook-id/',
                    'bio' => null,
                    'locale' => 'en_US',
                    'validated' => true,
                    'credentials' => [
                        'token' => 'token',
                        'secret' => null,
                        'expires' => (int) 1458510952
                    ],
                    'provider' => 'Facebook'
                ],
            ]

        ];
    }

    /**
     * Test _mapUser
     *
     * @expectedException CakeDC\Users\Exception\MissingProviderException
     */
    public function testMapUserException()
    {
        $data = [];
        $this->SocialAuthenticate = $this->getMockBuilder('CakeDC\Users\Auth\SocialAuthenticate')
            ->disableOriginalConstructor()
            ->getMock();

        $reflectedClass = new ReflectionClass($this->SocialAuthenticate);
        $mapUser = $reflectedClass->getMethod('_mapUser');
        $mapUser->setAccessible(true);
        $mapUser->invoke($this->SocialAuthenticate, null, $data);
    }

}
