<?php
    class MembershipDemand {
        /*
        * Variables of a MembershipDemand
        */
        protected $id;
        protected $date;

        /*
        * Constructor
        */
        function __construct($id) {
            // uniqid gives a string which ensures a unique id
            $this->id   = $id;
            $this->date = date("Y/m/d");
        }

        /*
        * Destructor
        */
        function __destruct() { }

        /*
        * Getters & Setters
        */
        function get_id() {
            return $this->id;
        }

        function set_id($newId) {
            $this->id = $newId;
        }

        function get_date() {
            return $this->date;
        }
    }
?>
