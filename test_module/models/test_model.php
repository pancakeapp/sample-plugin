<?php

class Test_model extends Pancake_Model {

    function __construct() {
        parent::__construct();

        # You can use $this->plugin to access any of your plugin's functions.
        $this->plugin = new Plugin_Sample_plugin();
    }

    function foo() {
        return "Hello, Bar! If you can see this, your model is loaded correctly.";
    }
    
}