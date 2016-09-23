<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();

    $server = "mysql:host=localhost:8889;dbname=hair_salon";
    $username = "root";
    $password = "root";
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"));

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll()));
    });
//====================STYLISTS===========================================
    $app->get("/stylists", function() use ($app) {
        return $app["twig"]->render("stylists.html.twig", array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        // return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll(), 'stylist' => $stylist, 'clients' => $stylist->getClients()));
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll(), 'stylist' => $stylist));
    });

    $app->post("/stylists", function() use ($app) {
        $new_stylist= new Stylist($_POST['new_stylist']);
        $new_stylist->save();
        return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll()));
    });

    $app->post("/delete_stylists", function() use ($app) {
        Stylist::deleteAll();
        return $app["twig"]->render("index.html.twig");
    });

    //=================Clients:============================================
    $app->get("/clients", function() use ($app) {
        return $app["twig"]->render("clients.html.twig", array('clients' => Client::getAll(), 'stylists' => Stylist::getAll()));
    });

    $app->post("/clients", function() use ($app) {
        $new_client= new Client($_POST['new_client_name'], $_POST['category_id']);
        $new_client->save();
        $stylist = Stylist::find($_POST['category_id']);
        return $app['twig']->render("clients.html.twig", array('stylist' => $stylist, 'matchingClients' => $stylist->getClients()));
    });

    $app->post("/delete_clients", function() use ($app) {
        Client::deleteAll();
        return $app["twig"]->render("clients.html.twig");
    });

    return $app;
?>
