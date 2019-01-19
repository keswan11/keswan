<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{
		$this->template->load('templates/landing_template','Landingpage');
	}

	function sip()
	{
		$this->template->load('templates/landing_template','Sip');
	}

	function sipp()
	{
		$this->template->load('templates/landing_template','Sipp');
	}

	function sivet()
	{
		$this->template->load('templates/landing_template','Sivet');
	}

	function download()
	{
		$this->template->load('templates/landing_template','Download');
	}


} 
