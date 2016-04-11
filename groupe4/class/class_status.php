<?php
    class Status {
        /*
        * Variables of a MembershipDemand
        */
        protected $id;
        protected $status;

        /*
        * Constructor
        */
        function __construct($id, $status) {
            $this->id   = $id;
            $this->status = $status;
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

        function get_status() {
            return $this->status;
        }

        function set_status() {
            $this->status = $status;
        }
    }
?>
