<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *	Helpme controller
 *	Displays markdown format as HMTL
 */
class Helpme extends Application
{
	/**
	 *	Index page for this controller.
	 *	Displays the index page, converting markdown from
	 *	jobs.md to HTML
	 */
	public function index()
	{
		$this->data['pagetitle'] = 'Help Wanted!';
    	$stuff = file_get_contents('../data/jobs.md');
    	$this->data['content'] = $this->parsedown->parse($stuff);
    	$this->render();
	}

}