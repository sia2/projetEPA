<?php
    class CA {
        /*
        * Variables of a MembershipDemand
        */
        protected $id;
        protected $startDate;
        protected $endDate;

        /*
        * Constructor
        */
        function __construct() {
            $this->id   = hexdec(uniqid());
            $this->startDate = date("Y/m/d");
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

        function get_startDate() {
            return $this->startDate;
        }

        function set_startDate() {
            $this->startDate = $startDate;
        }

        function get_endDate() {
            return $this->endDate;
        }

        function set_endDate() {
            $this->status = $endDate;
        }
    }
?>
