<?php

Class Search extends Controller
{
	function index()
	{
		$data['page_title'] = "Search";
		$this->view("searchView",$data);
	}

}
