<?php
/**
 * Gluu-oxd-library
 *
 * An open source application library for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015, Gluu inc, USA, Austin
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Gluu-oxd-library
 * @version 2.4.4
 * @author	Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 * @copyright	Copyright (c) 2015, Gluu inc federation (https://gluu.org/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://gluu.org/
 * @since	Version 2.4.4
 * @filesource
 */

/**
 * User information class
 *
 * Class is connecting to oxd-server via socket, and getting logedin user information url from gluu-server.
 *
 * @package		Gluu-oxd-library
 * @subpackage	Libraries
 * @category	Relying Party (RP) and User Managed Access (UMA)
 * @author		Vlad Karapetyan
 * @author		vlad.karapetyan.1988@mail.ru
 * @see	        Client_Socket_OXD_RP
 * @see	        Client_OXD_RP
 * @see	        Oxd_RP_config
 */

 namespace Drupal\gluu_sso\Plugin\oxds;
 use Drupal\gluu_sso\Plugin\oxds\Client_OXD_RP;

class Get_user_info extends Client_OXD_RP
{
    /**
     * @var string $request_oxd_id                            This parameter you must get after registration site in gluu-server
     */
    private $request_oxd_id = null;
    /**
     * @var string $request_access_token                            This parameter you must get after using get_token_code class
     */
    private $request_access_token = null;
    /**
     * Response parameter from oxd-server
     * Showing logedin user information
     *
     * @var array $response_claims
     */
    private $response_claims;

    /**
     * Constructor
     *
     * @return	void
     */
    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
    }
    
    /**
    * @var string $request_protection_access_token     access token for each request
    */
    private $request_protection_access_token;

    function getRequest_protection_access_token() {
        return $this->request_protection_access_token;
    }

    function setRequest_protection_access_token($request_protection_access_token) {
        $this->request_protection_access_token = $request_protection_access_token;
    }
    
    /**
     * @return array
     */
    public function getResponseClaims()
    {
        $this->response_claims = $this->getResponseData()->claims;
        return $this->response_claims;
    }

    /**
     * @return string
     */
    public function getRequestAccessToken()
    {
        return $this->request_access_token;
    }

    /**
     * @param string $request_access_token
     * @return void
     */
    public function setRequestAccessToken($request_access_token)
    {
        $this->request_access_token = $request_access_token;
    }

    /**
     * @return string
     */
    public function getRequestOxdId()
    {
        return $this->request_oxd_id;
    }

    /**
     * @param string $request_oxd_id
     * @return void
     */
    public function setRequestOxdId($request_oxd_id)
    {
        $this->request_oxd_id = $request_oxd_id;
    }

    /**
     * Protocol command to oxd server
     * @return void
     */
    public function setCommand()
    {
        $this->command = 'get_user_info';
    }
    /**
     * Protocol parameter to oxd server
     * @return void
     */
    public function setParams()
    {
        $this->params = array(
            "oxd_id" => $this->getRequestOxdId(),
            "access_token" => $this->getRequestAccessToken(),
            "protection_access_token"=> $this->getRequest_protection_access_token()
        );
    }

}
