<?php
    class Connection {
        /*
        * Variables of a Connection
        */
        protected $id;
        protected $pseudo;
        protected $password;

        /*
        * Constructor
        */
        function __construct($id, $pseudo, $password) {
            // uniqid gives a string which ensures a unique id
            $this->id   = $id;
            $this->pseudo = $pseudo;
            $this->password = $password;
        }

        /*
        * Destructor
        */
        function __destruct() {}

        /*
        * Getters & Setters
        */
        function get_id() {
            return $this->id;
        }

        function set_id($newId) {
            $this->id = $newId;
        }

        function get_pseudo() {
            return $this->pseudo;
        }

        function get_password() {
            return $this->password;
        }
    }
?>
