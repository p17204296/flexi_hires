<?php

Class logout extends Controller
{
	function index()
	{
        $user = $this->loadModel("user");
        $user->logout();

    }

}