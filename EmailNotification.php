<?php
class EmailNotification {
	public $settings = array(
		'orderform_vars' => array(
			'domain'
		) ,
		'description' => 'Sends you an email when a service needs to be created, terminated, suspended or unsuspended. Useful for when an order needs to be manually provisioned.',
	);
	function suspend($array) {
		global $billic, $db;
		$service = $array['service'];
		$billic->email(get_config('billic_companyemail') , 'Suspend service: ' . $service['domain'], 'ID: ' . $service['id']);
		return true;
	}
	function unsuspend($array) {
		global $billic, $db;
		$service = $array['service'];
		$billic->email(get_config('billic_companyemail') , 'Reactivate service: ' . $service['domain'], 'ID: ' . $service['id']);
		return true;
	}
	function terminate($array) {
		global $billic, $db;
		$service = $array['service'];
		$billic->email(get_config('billic_companyemail') , 'Terminate service: ' . $service['domain'], 'ID: ' . $service['id']);
		return true;
	}
	function create($array) {
		global $billic, $db;
		$vars = $array['vars'];
		$service = $array['service'];
		$plan = $array['plan'];
		$user_row = $array['user'];
		$billic->email(get_config('billic_companyemail') , 'Create service: ' . $service['domain'], 'ID: ' . $service['id']);
		return true;
	}
	function ordercheck($array) {
		global $billic, $db;
		$vars = $array['vars'];
		return $vars['domain']; // return the domain for the service to be called
		
	}
}
