<?php 
	
	class Session{
		protected $user;

	    public function __construct($user) {
	        $this->user = array();
	    }
	    public function setSession($user){
	    	$_SESSION['login'] = $this->user;
	    }
	}