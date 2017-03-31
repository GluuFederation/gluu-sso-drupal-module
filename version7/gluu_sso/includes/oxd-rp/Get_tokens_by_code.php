<?php
	/**
	 * @file
	 * Gluu_sso_get_tokens_by_code class .
	 */
	
	require_once 'Client_OXD_RP.php';
	
	class Gluu_sso_get_tokens_by_code extends Gluu_sso_client_OXD_RP
	{
		/**
		 * @var string $request_oxd_id This parameter you must get after registration site in gluu-server
		 */
		private $request_oxd_id = null;
		/**
		 * @var string $request_code This parameter you must get from URL, after redirecting authorization url
		 */
		private $request_code = null;
		/**
		 * @var string $request_state This parameter you must get from URL, after redirecting authorization url
		 */
		private $request_state = null;
		/**
		 * @var string $request_scopes For getting needed scopes data from gluu-server
		 */
		private $request_scopes = null;
		
		/**
		 * Response parameter from oXD-server
		 * It need to using for get_user_info and logout classes
		 * @var string $response_access_token
		 */
		private $response_access_token;
		/**
		 * Response parameter from oXD-server
		 * Showing user expires time
		 * @var string $response_expires_in
		 */
		private $response_expires_in;
		/**
		 * Response parameter from oXD-server
		 * It need to using for get_user_info and logout classes
		 * @var string $response_id_token
		 */
		private $response_id_token;
		/**
		 * Response parameter from oXD-server
		 * Showing user claimses and data
		 * @var string $response_expires_in
		 */
		private $response_id_token_claims;
		
		/**
		 * Constructor
		 * @return  void
		 */
		public function __construct()
		{
			parent::__construct(); // TODO: Change the autogenerated stub
		}
		
		/**
		 * @return string
		 */
		public function getRequestScopes()
		{
			return $this->request_scopes;
		}
		
		/**
		 * @param string $request_scopes
		 * @return  void
		 */
		public function setRequestScopes($request_scopes)
		{
			$this->request_scopes = $request_scopes;
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
		 * @return  void
		 */
		public function setRequestOxdId($request_oxd_id)
		{
			$this->request_oxd_id = $request_oxd_id;
		}
		
		/**
		 * @return string
		 */
		public function getRequestState()
		{
			return $this->request_state;
		}
		
		/**
		 * @param string $request_state
		 * @return  void
		 */
		public function setRequestState($request_state)
		{
			$this->request_state = $request_state;
		}
		
		/**
		 * @return string
		 */
		public function getRequestCode()
		{
			return $this->request_code;
		}
		
		/**
		 * @param string $request_code
		 * @return  void
		 */
		public function setRequestCode($request_code)
		{
			$this->request_code = $request_code;
		}
		
		/**
		 * @return string
		 */
		public function getResponseAccessToken()
		{
			if (!empty($this->getResponseData()->access_token)) {
				return $this->response_access_token = $this->getResponseData()->access_token;
			} else {
				return '';
			}
		}
		
		/**
		 * @return string
		 */
		public function getResponseExpiresIn()
		{
			$this->response_expires_in = $this->getResponseData()->expires_in;
			
			return $this->response_expires_in;
		}
		
		/**
		 * @return string
		 */
		public function getResponseIdToken()
		{
			$this->response_id_token = $this->getResponseData()->id_token;
			
			return $this->response_id_token;
		}
		
		/**
		 * @return string
		 */
		public function getResponseIdTokenClaims()
		{
			$this->response_id_token_claims = $this->getResponseData()->id_token_claims;
			
			return $this->response_id_token_claims;
		}
		
		/**
		 * Protocol command to oXD server
		 * @return void
		 */
		public function setCommand()
		{
			$this->command = 'get_tokens_by_code';
		}
		
		/**
		 * Protocol parameter to oXD server
		 * @return void
		 */
		public function setParams()
		{
			$this->params = array(
				"oxd_id" => $this->getRequestOxdId(),
				"code" => $this->getRequestCode(),
				"state" => $this->getRequestState()
			);
		}
		
	}