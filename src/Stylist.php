<?php
    class Stylist {
        private $stylist_name;
        private $id;

        function __construct($stylist_name, $id = null) {
            $this->stylist_name = $stylist_name;
            $this->id = $id;
        }

        function getId() {
            return $this->id;
        }

        function getStylistName() {
            return $this->stylist_name;
        }

        function setStylistName($new_stylist_name){
            $this->stylist_name = $new_stylist_name;
        }

        function getClients() {
            $matching_clients = array();
            $belonging_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");

            foreach ($belonging_clients as $belonging_client) {
                $name = $belonging_client['client_name'];
                $stylist_id = $belonging_client['stylist_id'];
                $id = $belonging_client['id'];
                $belong_client = new Client($name, $stylist_id, $id);
                array_push($matching_clients, $belong_client);
            }
            return $matching_clients;
        }

        static function getAll() {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $all_stylists = array();
            foreach($returned_stylists as $stylist) {
                $name = $stylist['stylist_name'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $id);
                array_push($all_stylists, $new_stylist);
            }
            return $all_stylists;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_name) VALUES ('{$this->getStylistName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        static function find($search_id) {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
                return $found_stylist;
            }
        }

        function update($new_stylist_name) {
            $GLOBALS['DB']->exec("UPDATE stylists SET stylist_name = '{$new_stylist_name}' WHERE id = {$this->getId()};");
            $this->setStylistName($new_stylist_name);
        }
    }
 ?>
