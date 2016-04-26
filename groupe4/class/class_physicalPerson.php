<?php

    class PhysicalPerson {
        /*
        * Variables of a Person
        */
        protected $id         = '';
        protected $date       = '';
        protected $name       = '';
        protected $firstname  = '';
        protected $origine    = '';
        protected $gender     = '';
        protected $tel        = '';
        protected $email      = '';
        protected $profession = '';
        protected $interests  = '';

        /*
        * Constructor
        */
        function __construct($id, $name, $firstname, $origine, $gender, $tel, $email, $profession, $interests) {
            if($id == '') {
                $this->id   = hexdec(uniqid());
                $this->date = date("Y/m/d");
            } else {
                $this->id   = $id;
            }

            $this->name       = $name;
            $this->firstname  = $firstname;
            $this->origine    = $origine;
            $this->gender     = $gender;
            $this->tel        = $tel;
            $this->email      = $email;
            $this->profession = $profession;
            $this->interests  = $interests;
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

        function get_date() {
            return $this->date;
        }

        function get_name() {
            return $this->name;
        }

        function get_firstname() {
            return $this->firstname;
        }

        function get_origine() {
            return $this->origine;
        }

        function get_gender() {
            return $this->gender;
        }

        function get_tel() {
            return $this->tel;
        }

        function get_email() {
            return $this->email;
        }

        function get_profession() {
            return $this->profession;
        }

        function get_interests() {
            return $this->interests;
        }
    }
?>
