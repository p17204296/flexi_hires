<?php

class home extends Controller
{
    function index()
    {
        $data['page_title'] = "Home";
        $this->view("homeView", $data);

    }


}