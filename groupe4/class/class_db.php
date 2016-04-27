<?php
    class Database {
        /*
        * Please fill the following variables
        * to connect the database
        */
        /* ************************************ */
        /* ************************************ */
        public $db_address = 'localhost';
        public $db_name    = "bddepa";
        public $user       = "root";
        public $password   = "";
        /* ************************************ */
        public $connection;

        /*
        * Open the database
        */
        function open_db() {
            $this->connection = mysqli_connect($this->db_address, $this->user, $this->password, $this->db_name);
            mysqli_connect_errno($this->connection);
        }

        /*
        * Close the database
        */
        function close_db() {
            mysqli_close($this->connection);
        }

        function check_availability_account($physicalPerson, $connec) {

          if($connec->get_password() == '') {
            echo 'Password field empty.';
            return 1;
          }

          if($connec->get_pseudo() == '') {
            echo 'Pseudonyme field empty';
            return 1;
          }

          if($physicalPerson->get_name() == '') {
            echo 'Name field empty';
            return 1;
          }

          if($physicalPerson->get_firstname() == '') {
            echo 'Firstname field empty';
            return 1;
          }

          if($physicalPerson->get_tel() == '') {
            echo 'Telephone number field empty';
            return 1;
          }

          if($physicalPerson->get_email() == '') {
            echo 'Email field empty';
            return 1;
          }

          if($physicalPerson->get_gender() == '') {
            echo 'Gender field empty';
            return 1;
          }

          if($physicalPerson->get_origine() == '') {
            echo 'Origine field empty';
            return 1;
          }

          $sql = "SELECT email FROM personne_physique WHERE email='".$physicalPerson->get_email()."'";
          if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
              echo 'Email already exist in our database <br>';
              return 1;
          }

          $sql = "SELECT login FROM connexion WHERE login='".$connec->get_pseudo()."'";
          if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
              echo 'Pseudonyme already exist in our database <br>';
              return 1;
          }

          return 0;
        }

        /*
        * Insert physical person
        */
        function insert_physicalPerson($physicalPerson) {
            if(get_class($physicalPerson) == 'PhysicalPerson') {
                if($this->connection) {
                    ///////////////////////////////////////
                    // Insertion Physical Person attributes
                    ///////////////////////////////////////
                    // Check if Email already exist
                    $sql = "SELECT email FROM personne_physique WHERE email='".$physicalPerson->get_email()."'";
                    if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
                        echo 'Email already exist in our database <br>';
                    } else {

                      $sql = "INSERT INTO personne_physique (id_personne_ph, nom_personne_ph, prenom_personne_ph, email, tel, origine, sexe, profession, centre_interet)
                              VALUES ('".$physicalPerson->get_id()."', '".$physicalPerson->get_name()."',
                              '".$physicalPerson->get_firstname()."', '".$physicalPerson->get_email()."', '".$physicalPerson->get_tel()."', '".$physicalPerson->get_origine()."', '".$physicalPerson->get_gender()."', '".$physicalPerson->get_profession()."','".$physicalPerson->get_interests()."')";

                      if (($this->connection).query($sql) === TRUE) {
                        $sql = "SELECT email FROM personne_physique WHERE email='".$physicalPerson->get_email()."'";
                        if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
                            return 0;
                        } else {
                          return 10;
                        }
                      } else {
                          return 11;
                      }
                    }

                } else {
                    return 12;
                }
            } else {
                return 13;
            }
        }

        /*
        * Insert address
        */
        function insert_address($address) {
            if(get_class($address) == 'Address') {
                if($this->connection) {
                    //////////////////////////////////
                    // Insertion Address attributes
                    //////////////////////////////////
                    $sql = "INSERT INTO adresse (id_adresse, num_rue, nom_rue, code_postale)
                            VALUES ('".$address->get_id()."', '".$address->get_streetNumber()."', '".$address->get_streetName()."', '".$address->get_postalCode()."');";
                    if (($this->connection).query($sql) === TRUE) {
                        return 0;
                    } else {
                        return 11;
                    }
                } else {
                    return 12;
                }
            } else {
                return 13;
            }
        }

        /*
        * Insert connection
        */
        function insert_connection($connec) {
            if(get_class($connec) == 'Connection') {
                if($this->connection) {
                    //////////////////////////////////
                    // Insertion Connection attributes
                    //////////////////////////////////

                    $sql = "SELECT login FROM connexion WHERE login='".$connec->get_pseudo()."'";
                    if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
                        echo 'Pseudonyme already exist in our database <br>';
                    } else {
                      $sql = "INSERT INTO connexion (id_connexion, login, password)
                              VALUES ('".$connec->get_id()."', '".$connec->get_pseudo()."', '".$connec->get_password()."')";
                      if (($this->connection).query($sql) === TRUE) {
                        $sql = "SELECT login FROM connexion WHERE login='".$connec->get_pseudo()."'";
                        if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
                            return 0;
                        } else {
                          return 10;
                        }
                      } else {
                          return 1;
                      }
                    }
                } else {
                    return 1;
                }
            } else {
                return 1;
            }
        }

        /*
        * Insert membership demand
        */
        function insert_membershipDemand($membershipDemand) {
            if(get_class($membershipDemand) == 'MembershipDemand') {
                if($this->connection) {
                    ////////////////////////////////////////
                    // Insertion MembershipDemand attributes
                    ////////////////////////////////////////
                    $sql = "INSERT INTO demande_adhesion (id_adhesion, date)
                            VALUES ('".$membershipDemand->get_id()."', '".$membershipDemand->get_date()."')";
                    if (($this->connection).query($sql) === TRUE) {
                        return 0;
                    } else {
                        return 1;
                    }
                } else {
                    return 1;
                }
            } else {
                return 1;
            }
        }

        /*
        * Insert membership demand
        */
        function insert_status($status) {
            if(get_class($status) == 'Status') {
                if($this->connection) {
                    ////////////////////////////////////////
                    // Insertion Status attributes
                    ////////////////////////////////////////
                    $sql = "INSERT INTO statut (id_statut, libelle)
                            VALUES ('".$status->get_id()."', '".$status->get_status()."')";
                    if (($this->connection).query($sql) === TRUE) {
                        return 0;
                    } else {
                        return 1;
                    }
                } else {
                    return 1;
                }
            } else {
                return 1;
            }
        }

        /*
        * Check if account exist
        */
        function check_account($pseudo, $password) {
            $sql = "SELECT login FROM connexion WHERE login='$pseudo' AND password='$password'";

            $json = array();
            $result = mysqli_query($this->connection, $sql);
            $emparray = array();
            while($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
            $result = json_encode($emparray);
            $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($result, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

            $login = '';

            foreach ($jsonIterator as $key => $val) {
                if(is_array($val)) {

                } else {
                    if($key == 'login') {
                        $login = $val;
                    }
                }
            }

            if($login != '') {
                return 0;
            } else {
                return 1;
            }
        }

        /*
        * get ID if account exist
        */
        function get_id_from_account($pseudo, $password) {
            $sql = "SELECT id_connexion FROM connexion WHERE login='$pseudo' AND password='$password'";

            $json = array();
            $result = mysqli_query($this->connection, $sql);
            $emparray = '';
            while($row = mysqli_fetch_assoc($result)) {
                $emparray= $row['id_connexion'];
            }
            /*
            $result = json_encode($emparray);
            $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($result, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

            $id = '';

            foreach ($jsonIterator as $key => $val) {
                if(is_array($val)) {

                } else {
                    if($key == 'id_connexion') {
                        $id = $val;
                    }
                }
            }
			*/
            if($emparray != '') {
                return $emparray;
            } else {
                return NULL;
            }
        }

        function get_status_from_id($id) {

            if($id != '') {
                $sql = "SELECT libelle FROM statut WHERE id_statut='$id'";
                $result = mysqli_query($this->connection, $sql);
                $json = array();
                $emparray = array();
                while($row = mysqli_fetch_assoc($result)) {
                    $emparray[] = $row;
                }
                $result = json_encode($emparray);
                $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($result, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);

                $libelle = '';

                foreach ($jsonIterator as $key => $val) {
                    if(is_array($val)) {

                    } else {
                        if($key == 'libelle') {
                            $libelle = $val;
                        }
                    }
                }

                return $libelle;
            } else {
                return NULL;
            }
        }

        /*
        * get status if account exist
        */
        function get_status($pseudo, $password) {

            $id = $this->get_id_from_account($pseudo, $password);
            if($id != '') {
                $sql = "SELECT libelle FROM statut WHERE id_statut='$id'";
                $result = mysqli_query($this->connection, $sql);
                $json = array();
                $emparray = '';
                while($row = mysqli_fetch_assoc($result)) {
                    $emparray = $row['libelle'];
                }
				/*
                $result = json_encode($emparray);
                $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($result, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);

                $libelle = '';

                foreach ($jsonIterator as $key => $val) {
                    if(is_array($val)) {
                    	$libelle = $val;
                    } else {
                        if($key == 'libelle') {
                            $libelle = $val;
                        }
                    }
                }
				*/
                printf($emparray);
                return $emparray;
            } else {
                return NULL;
            }
        }

        /*
        * get status if account exist
        */
        function get_membershipDemand($pseudo, $password) {

            $id = $this->get_id_from_account($pseudo, $password);
            if($id != '') {
                $sql = "SELECT * FROM demande_adhesion WHERE id_adhesion='$id'";

                if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
                    return 'exist';
                } else {
                  return '';
                }
            } else {
                return '';
            }
        }

        /*
        * get status if account exist
        */
        function get_membership($pseudo, $password) {

            $id = $this->get_id_from_account($pseudo, $password);

            if($id != '') {
                $sql = "SELECT * FROM adherent WHERE id_adherent='$id'";

                if(mysqli_num_rows(mysqli_query($this->connection, $sql)) > 0){
                    return 'exist';
                } else {
                  return '';
                }
            } else {
                return '';
            }
        }

        /*
        * get status if account exist
        */
        function get_all_membershipDemand() {

            $sql = "SELECT * FROM demande_adhesion";

            $result = mysqli_query($this->connection, $sql);
            $json = array();
            $emparray = array();
            while($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
            $result = json_encode($emparray);
            $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($result, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

            $id = '';
            $array = array();

            foreach ($jsonIterator as $key => $val) {
                if(is_array($val)) {

                } else {
                    if($key == 'id_adhesion') {
                        $id = $val;
                        array_push($array, $this->get_physicalPerson_from_id($id));
                    }
                }
            }

            return $array;
        }

        /*
        * get status if account exist
        */
        function get_all_membership() {

            $sql = "SELECT * FROM adherent";

            $result = mysqli_query($this->connection, $sql);
            $json = array();
            $emparray = array();
            while($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
            $result = json_encode($emparray);
            $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($result, TRUE)),
            RecursiveIteratorIterator::SELF_FIRST);

            $id = '';
            $array = array();

            foreach ($jsonIterator as $key => $val) {
                if(is_array($val)) {

                } else {
                    if($key == 'id_adherent') {
                        $id = $val;
                        $pp = $this->get_physicalPerson_from_id($id);
                        $pp = json_decode($pp, true);
                        $pp[0]['status'] = $this->get_status_from_id($id);
                        $pp = json_encode($pp);
                        array_push($array, $pp);
                    }
                }
            }

            return $array;
        }

        /*
        * get physicialPerson if account exist
        */
        function get_physicalPerson_from_id($id) {
            $sql = "SELECT * FROM personne_physique WHERE id_personne_ph='$id'";
            $result = mysqli_query($this->connection, $sql);
            $json = array();
            $emparray = array();
            while($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
            $result = json_encode($emparray, true);
            return $result;
        }

        /*
        * accept membershipDemand
        */
        function accept_membershipDemand($id) {
            $sql = "INSERT INTO adherent (id_adherent, date)
                  VALUES ('".$id."', '".date("Y/m/d")."')";
            if (($this->connection).query($sql) === TRUE) {
                // delete from membershipDemand table
                $sql = "DELETE FROM demande_adhesion WHERE id_adhesion='$id'";
                if (($this->connection).query($sql) === TRUE) {
                    return 0;
                } else {
                    return 1;
                }
            } else {
                return 1;
            }
        }

        /*
        * accept membershipDemand
        */
        function refuse_membershipDemand($id) {
            $sql = "DELETE FROM demande_adhesion WHERE id_adhesion='$id'";
            if (($this->connection).query($sql) === TRUE) {
                return 0;
            } else {
                return 1;
            }
        }

        /*
        * accept membershipDemand
        */
        function remove_membership($id) {
            $sql = "DELETE FROM adherent WHERE id_adherent='$id'";
            if (($this->connection).query($sql) === TRUE) {
                return 0;
            } else {
                return 1;
            }
        }

        /*
        * update status
        */
        function update_status_from_id($id, $newStatus) {
          if($newStatus != '') {
            $sql = "UPDATE statut SET libelle='$newStatus' WHERE id_statut='$id'";
            if (($this->connection).query($sql) === TRUE) {
                return 0;
            } else {
                return 1;
            }
          }
        }

        /*
        * update physical person
        */
        function update_physicalPerson($physicalPerson) {
            if(get_class($physicalPerson) == 'PhysicalPerson') {
                if($this->connection) {
                    ///////////////////////////////////////
                    // Insertion Physical Person attributes
                    ///////////////////////////////////////
                    $id           = $physicalPerson->get_id();
                    $name         = $physicalPerson->get_name();
                    $firstname    = $physicalPerson->get_firstname();
                    $origine      = $physicalPerson->get_origine();
                    $gender       = $physicalPerson->get_gender();
                    $tel          = $physicalPerson->get_tel();
                    $address      = $physicalPerson->get_address();
                    $city         = $physicalPerson->get_city();
                    $postalCode   = $physicalPerson->get_postalCode();
                    $email        = $physicalPerson->get_email();
                    $profession   = $physicalPerson->get_profession();
                    $interests    = $physicalPerson->get_interests();

                    $sql = "UPDATE personne_physique SET nom_personne_ph='$name', prenom_personne_ph='$firstname'
                            , origine='$origine', sexe='$gender', tel='$tel', adresse_personne_ph='$address'
                            , ville_personne_ph='$city', cp_personne_ph='$postalCode', email='$email', profession='$profession'
                            , centreinterets='$interests' WHERE id_personne_ph='$id'";

                    if (($this->connection).query($sql) === TRUE) {
                        return 0;
                    } else {
                        return 1;
                    }
                }
            }
        }

        /*
        * user suggestion
        */
        function user_suggestion($name, $firstname) {
          $sql = "SELECT id_personne_ph, nom_personne_ph, prenom_personne_ph FROM personne_physique WHERE nom_personne_ph LIKE '%".$name."%' AND prenom_personne_ph LIKE '%".$firstname."%'";
          $result = mysqli_query($this->connection, $sql);
          $emparray = NULL;
          while($row = mysqli_fetch_assoc($result)) {
              $emparray[] = $row;
          }
          $result = json_encode($emparray, true);
          echo $result;
        }
    }
?>
