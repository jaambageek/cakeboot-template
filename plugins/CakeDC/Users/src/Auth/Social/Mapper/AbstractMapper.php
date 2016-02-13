<?php
/**
 * Created by PhpStorm.
 * User: ajibarra
 * Date: 10/16/15
 * Time: 7:02 AM
 */

namespace CakeDC\Users\Auth\Social\Mapper;

use Cake\Utility\Hash;

abstract class AbstractMapper
{
    /**
     * Provider Raw data
     * @var
     */
    protected $_rawData;

    /**
     * Map for provider fields
     * @var null
     */
    protected $_mapFields;

    /**
     * Default Map for provider fields
     * @var
     */
    protected $_defaultMapFields = [
        'id' => 'id',
        'username' => 'username',
        'full_name' => 'name',
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'email' => 'email',
        'avatar' => 'avatar',
        'gender' => 'gender',
        'link' => 'link',
        'bio' => 'bio',
        'locale' => 'locale',
        'validated' => 'validated'
    ];

    /**
     * Constructor
     *
     * @param $rawData
     * @param null $mapFields
     */
    public function __construct($rawData, $mapFields = null)
    {
        $this->_rawData = $rawData;
        if (!is_null($mapFields)) {
            $this->_mapFields = $mapFields;
        }
        $this->_mapFields = array_merge($this->_defaultMapFields, $this->_mapFields);
    }
    /**
     * Invoke method
     */
    public function __invoke()
    {
        return $this->_map();
    }

    /**
     * If email is present the user is validated
     * @return bool
     */
    protected function _validated()
    {
        return !empty(Hash::get($this->_rawData, $this->_mapFields['email']));
    }

    /**
     * Maps raw data using mapFields
     *
     * @return mixed
     */
    protected function _map()
    {
        $result = [];
        collection($this->_mapFields)->each(function ($mappedField, $field) use (&$result) {
            $value = Hash::get($this->_rawData, $mappedField);
            $function = '_' . $field;
            if (method_exists($this, $function)) {
                $value = $this->{$function}();
            }
            $result[$field] = $value;
        });
        $token = Hash::get($this->_rawData, 'token');
        $result['credentials'] = [
            'token' => is_array($token) ? Hash::get($token, 'accessToken') : $token->getToken(),
            'secret' => is_array($token) ? Hash::get($token, 'tokenSecret') : null,
            'expires' => is_array($token) ? Hash::get($token, 'expires') : $token->getExpires(),
        ];
        $result['raw'] = $this->_rawData;
        return $result;
    }
}
