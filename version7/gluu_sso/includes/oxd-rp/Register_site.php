<?php
	/**
	 * @file
	 * Gluu_sso_register_site class .
	 */
	
	require_once 'Client_OXD_RP.php';
	
	class Gluu_sso_register_site extends Gluu_sso_client_OXD_RP
	{
		/*
		* @var string $request_op_host                         Gluu server url
		*/
		private $request_op_host = null;
		/**
		 * @var string $request_authorization_redirect_uri Site authorization redirect uri
		 */
		private $request_authorization_redirect_uri = null;
		/**
		 * @var string $request_authorization_redirect_uri Site authorization redirect uri
		 */
		private $request_client_id = null;
		/**
		 * @var string $request_authorization_redirect_uri Site authorization redirect uri
		 */
		private $request_client_secret = null;
		/**
		 * @var string $request_logout_redirect_uri Site logout redirect uri
		 */
		private $request_logout_redirect_uri = null;
		/**
		 * @var string $request_application_type web or mobile
		 */
		private $request_application_type = 'web';
		/**
		 * @var array $request_acr_values Gluu login acr type, can be basic, duo, u2f, gplus and etc.
		 */
		private $request_acr_values = array();
		/**
		 * @var string $request_client_jwks_uri
		 */
		private $request_client_jwks_uri = '';
		/**
		 * @var string $request_client_token_endpoint_auth_method
		 */
		private $request_client_token_endpoint_auth_method = '';
		/**
		 * @var array $request_client_request_uris
		 */
		private $request_client_request_uris = null;
		/**
		 * @var array $request_contacts
		 */
		private $request_contacts = null;
		/**
		 * @var array $request_scope For getting needed scopes from gluu-server
		 */
		private $request_scope = array();
		/**
		 * @var array $request_grant_types OpenID Token Request type
		 */
		private $request_grant_types = array();
		/**
		 * @var array $request_response_types OpenID Authentication response types
		 */
		private $request_response_types = array();
		/**
		 * @var array $request_client_logout_uris
		 */
		private $request_client_logout_uris = null;
		/**
		 * Response parameter from oXD-server
		 * It is basic parameter for other protocols
		 * @var string $response_oxd_id
		 */
		private $response_oxd_id;
		private $response_op_host;
		
		/**
		 * Constructor
		 * @return  void
		 */
		public function __construct()
		{
			parent::__construct(); // TODO: Change the autogenerated stub
			$this->setRequestApplicationType();
		}
		
		/**
		 * @return string
		 */
		public function getRequestClientSecret()
		{
			return $this->request_client_secret;
		}
		
		/**
		 * @param string $request_client_secret
		 */
		public function setRequestClientSecret($request_client_secret)
		{
			$this->request_client_secret = $request_client_secret;
		}
		
		/**
		 * @return string
		 */
		public function getRequestClientId()
		{
			return $this->request_client_id;
		}
		
		/**
		 * @param string $request_client_id
		 */
		public function setRequestClientId($request_client_id)
		{
			$this->request_client_id = $request_client_id;
		}
		
		/**
		 * @return string
		 */
		public function getRequestOpHost()
		{
			return $this->request_op_host;
		}
		
		/**
		 * @param string $request_op_host
		 * @return void
		 */
		public function setRequestOpHost($request_op_host)
		{
			$this->request_op_host = $request_op_host;
		}
		
		/**
		 * @return array
		 */
		public function getRequestClientLogoutUris()
		{
			return $this->request_client_logout_uris;
		}
		
		/**
		 * @param array $request_client_logout_uris
		 * @return void
		 */
		public function setRequestClientLogoutUri($request_client_logout_uris)
		{
			$this->request_client_logout_uris = $request_client_logout_uris;
		}
		
		/**
		 * @return array
		 */
		public function getRequestResponseTypes()
		{
			return $this->request_response_types;
		}
		
		/**
		 * @param array $request_response_types
		 * @return void
		 */
		public function setRequestResponseTypes($request_response_types)
		{
			$this->request_response_types = $request_response_types;
		}
		
		/**
		 * @return array
		 */
		public function getRequestGrantTypes()
		{
			return $this->request_grant_types;
		}
		
		/**
		 * @param array $request_grant_types
		 * @return void
		 */
		public function setRequestGrantTypes($request_grant_types)
		{
			$this->request_grant_types = $request_grant_types;
		}
		
		/**
		 * @return array
		 */
		public function getRequestScope()
		{
			return $this->request_scope;
		}
		
		/**
		 * @param array $request_scope
		 * @return void
		 */
		public function setRequestScope($request_scope)
		{
			$this->request_scope = $request_scope;
		}
		
		/**
		 * @return string
		 */
		public function getRequestLogoutRedirectUri()
		{
			return $this->request_logout_redirect_uri;
		}
		
		/**
		 * @param string $request_logout_redirect_uri
		 * @return void
		 */
		public function setRequestLogoutRedirectUri($request_logout_redirect_uri)
		{
			$this->request_logout_redirect_uri = $request_logout_redirect_uri;
		}
		
		/**
		 * @return string
		 */
		public function getRequestClientJwksUri()
		{
			return $this->request_client_jwks_uri;
		}
		
		/**
		 * @param string $request_client_jwks_uri
		 * @return void
		 */
		public function setRequestClientJwksUri($request_client_jwks_uri)
		{
			$this->request_client_jwks_uri = $request_client_jwks_uri;
		}
		
		/**
		 * @return string
		 */
		public function getRequestClientTokenEndpointAuthMethod()
		{
			return $this->request_client_token_endpoint_auth_method;
		}
		
		/**
		 * @param string $request_client_token_endpoint_auth_method
		 * @return void
		 */
		public function setRequestClientTokenEndpointAuthMethod($request_client_token_endpoint_auth_method)
		{
			$this->request_client_token_endpoint_auth_method = $request_client_token_endpoint_auth_method;
		}
		
		/**
		 * @return array
		 */
		public function getRequestClientRequestUris()
		{
			return $this->request_client_request_uris;
		}
		
		/**
		 * @param array $request_client_request_uris
		 * @return void
		 */
		public function setRequestClientRequestUris($request_client_request_uris)
		{
			$this->request_client_request_uris = $request_client_request_uris;
		}
		
		/**
		 * @return string
		 */
		public function getRequestApplicationType()
		{
			return $this->request_application_type;
		}
		
		/**
		 * @param string $request_application_type
		 * @return void
		 */
		public function setRequestApplicationType($request_application_type = 'web')
		{
			$this->request_application_type = $request_application_type;
		}
		
		/**
		 * @return string
		 */
		public function getRequestAuthorizationRedirectUri()
		{
			return $this->request_authorization_redirect_uri;
		}
		
		/**
		 * @param string $request_authorization_redirect_uri
		 * @return void
		 */
		public function setRequestAuthorizationRedirectUri($request_authorization_redirect_uri)
		{
			$this->request_authorization_redirect_uri = $request_authorization_redirect_uri;
		}
		
		/**
		 * @return array
		 */
		public function getRequestAcrValues()
		{
			return $this->request_acr_values;
		}
		
		/**
		 * @param array $request_acr_values
		 * @return void
		 */
		public function setRequestAcrValues($request_acr_values = 'basic')
		{
			$this->request_acr_values = $request_acr_values;
		}
		
		/**
		 * @return array
		 */
		public function getRequestContacts()
		{
			return $this->request_contacts;
		}
		
		/**
		 * @param array $request_contacts
		 * @return void
		 */
		public function setRequestContacts($request_contacts)
		{
			$this->request_contacts = $request_contacts;
		}
		
		/**
		 * @return string
		 */
		public function getResponseOxdId()
		{
			$this->response_oxd_id = $this->getResponseData()->oxd_id;
			
			return $this->response_oxd_id;
		}
		
		/**
		 * @return string
		 */
		public function getResponseOpHost()
		{
			$this->response_op_host = $this->getResponseData()->op_host;
			
			return $this->response_op_host;
		}
		
		/**
		 * Protocol command to oXD server
		 * @return void
		 */
		public function setCommand()
		{
			$this->command = 'register_site';
		}
		
		/**
		 * Protocol parameter to oXD server
		 * @return void
		 */
		public function setParams()
		{
			$this->params = array(
				"op_host" => $this->getRequestOpHost(),
				"authorization_redirect_uri" => $this->getRequestAuthorizationRedirectUri(),
				"post_logout_redirect_uri" => $this->getRequestLogoutRedirectUri(),
				"application_type" => 'web',
				"acr_values" => $this->getRequestAcrValues(),
				"scope" => $this->getRequestScope(),
				"client_jwks_uri" => $this->getRequestClientJwksUri(),
				"client_token_endpoint_auth_method" => $this->getRequestClientTokenEndpointAuthMethod(),
				"client_request_uris" => $this->getRequestClientRequestUris(),
				"contacts" => $this->getRequestContacts(),
				"grant_types" => ["authorization_code"],
				"response_types" => ["code"],
				"client_logout_uris" => [$this->getRequestClientLogoutUris()],
				"client_id" => $this->getRequestClientId(),
				"client_secret" => $this->getRequestClientSecret()
			);
		}
		
	}