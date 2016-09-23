<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_save() {
            // ARRANGE
            $id = null;
            $name = "Bridgette";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            // ACT
            $result = Stylist::getAll();

            // ASSERT
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll() {
            //ARRANGE
            $id = null;
            $name1 = "Bridgette";
            $name2 = "Alicia";
            $test_stylist1 = new Stylist($name1, $id);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();

            //ACT
            $result = Stylist::getAll();

            //ASSERT
            $this->assertEquals([$test_stylist1, $test_stylist2], $result);
        }

        function test_deleteAll() {
            //ARRANGE
            $id = null;
            $name1 = "Bridgette";
            $name2 = "Alicia";
            $test_stylist1 = new Stylist($name1, $id);
            $test_stylist1->save();
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();

            //ACT
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //ASSERT
            $this->assertEquals([], $result);
        }

        function test_find() {
            //ARRANGE
            $id = null;
            $name = "Alicia";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            //ACT
            $result = Stylist::find($test_stylist->getId());

            //ASSERT
            $this->assertEquals($test_stylist, $result);

        }

        function test_update() {
            //ARRANGE
            $id = null;
            $name = "Amia";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $new_name = "Ed";

            //ACT
            $test_stylist->update($new_name);

            //ASSERT
            $this->assertEquals("Ed", $test_stylist->getStylistName());
        }

        function test_getClients() {
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
            $result = $test_stylist->getClients();

            //ASSERT
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

    }
 ?>
