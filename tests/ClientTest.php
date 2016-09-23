<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_save() {
            // ARRANGE
            //========The Stylist:================
            $id = null;
            $name = "Bridgette";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            //========The Client:================
            $id = null;
            $name = "Anand";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();

            // ACT
            $result = Client::getAll();

            // ASSERT
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll() {
            //ARRANGE
            //========The Stylist:================
            $id = null;
            $name = "Alicia";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            //========The Clients:================
            $id = null;
            $name1 = "Anand";
            $name2 = "Baayaa";
            $stylist_id = $test_stylist->getId();
            $test_client1 = new Client($name1, $stylist_id, $id);
            $test_client1->save();
            $test_client2 = new Client($name2, $stylist_id, $id);
            $test_client2->save();
            //ACT
            $result = Client::getAll();

            //ASSERT
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

        function test_deleteAll() {
            //ARRANGE
            //========The Stylist:================
            $id = null;
            $name = "Alicia";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            //========The Clients:================
            $id = null;
            $name1 = "Anand";
            $name2 = "Baayaa";
            $stylist_id = $test_stylist->getId();
            $test_client1 = new Client($name1, $stylist_id, $id);
            $test_client1->save();
            $test_client2 = new Client($name2, $stylist_id, $id);
            $test_client2->save();

            //ACT
            Client::deleteAll();
            $result = Client::getAll();

            //ASSERT
            $this->assertEquals([], $result);
        }

        function test_find() {
            //ARRANGE
            //========The Stylist:================
            $id = null;
            $name = "Alicia";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            //========The Clients:================
            $id = null;
            $name = "Anand";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();


            //ACT
            $result = Client::find($test_client->getId());

            //ASSERT
            $this->assertEquals($test_client, $result);

        }

        function test_update() {
            //ARRANGE
            //========The Stylist:================
            $id = null;
            $name = "Alicia";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            //========The Clients:================
            $id = null;
            $name = "Anand";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $stylist_id, $id);
            $test_client->save();

            $new_name = "Baayaa";

            //ACT
            $test_client->update($new_name);

            //ASSERT
            $this->assertEquals("Baayaa", $test_client->getClientName());
        }
    }
 ?>
