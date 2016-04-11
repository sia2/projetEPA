<?php
    class Address {
        /*
        * Variables of a Connection
        */
        protected $id;
        protected $streetNumber;
        protected $streetName;
        protected $department;
        protected $postalCode;

        /*
        * Constructor
        */
        function __construct($id, $streetNumber, $streetName, $department, $postalCode) {
            // uniqid gives a string which ensures a unique id
            $this->id   = $id;
            $this->streetNumber = $streetNumber;
            $this->streetName = $streetName;
            $this->department = $department;
            $this->postalCode = $postalCode;
        }

        /*
        * Destructor
        */
        function __destruct() {
        }

        /*
        * Getters & Setters
        */
        function get_id() {
            return $this->id;
        }

        function set_id($newId) {
            $this->id = $newId;
        }

        function get_streetNumber() {
            return $this->streetNumber;
        }

        function get_streetName() {
            return $this->streetName;
        }

        function get_department() {
            return $this->department;
        }

        function get_postalCode() {
            return $this->postalCode;
        }
    }
?>
