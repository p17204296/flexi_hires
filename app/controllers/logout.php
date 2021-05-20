<?php

class logout extends Controller
{
    function index()
    {
        $user = $this->loadModel("user");
        $user->logout();

    }

}