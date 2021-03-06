<?php
	/**
	 * @file
	 * Gluu_sso_get_user_info class .
	 */
	
	
	require_once 'Client_OXD_RP.php';
	
	class Gluu_sso_get_user_info extends Gluu_sso_client_OXD_RP
	{
		/**
		 * @var string $request_oxd_id This parameter you must get after registration site in gluu-server
		 */
		private $request_oxd_id = null;
		/**
		 * @var string $request_access_token This parameter you must get after using get_token_code class
		 */
		private $request_access_token = null;
		/**
		 * Response parameter from oXD-server
		 * Showing logedin user information
		 * @var array $response_claims
		 */
		private $response_claims;
		
		/**
		 * Constructor
		 * @return  void
		 */
		public function __construct()
		{
			parent::__construct(); // TODO: Change the autogenerated stub
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
		 * Protocol command to oXD server
		 * @return void
		 */
		public function setCommand()
		{
			$this->command = 'get_user_info';
		}
		
		/**
		 * Protocol parameter to oXD server
		 * @return void
		 */
		public function setParams()
		{
			$this->params = array(
				"oxd_id" => $this->getRequestOxdId(),
				"access_token" => $this->getRequestAccessToken()
			);
		}
		
	}