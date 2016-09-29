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

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll()));
    });
//====================STYLISTS===========================================

    $app->post("/create_stylist", function() use ($app) {
      $new_stylist= new Stylist($_POST['new_stylist']);
      $new_stylist->save();
      return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $match_clients = $stylist->getClients();
        return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'matchingClients' => $match_clients));
    });

    $app->post("/delete_stylists", function() use ($app) {
        Stylist::deleteAll();
        return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll(), 'clients' => Client::getAll()));
    });

    $app->delete("/delete_stylist/{id}", function($id) use ($app) {
      $stylist = Stylist::find($id);
      $stylist->deleteStylist();
      return $app['twig']->render("index.html.twig", array('stylists' => Stylist::getAll()));
    });

    //=================Clients:============================================
    $app->post("/client_add/{id}", function($id) use ($app) {
      $new_client= new Client($_POST['new_client_name'], $id);
      $new_client->save();
      $stylist = Stylist::find($id);
      $match_clients = $stylist->getClients();
      return $app['twig']->render("stylists.html.twig", array('stylist' => $stylist, 'matchingClients' => $match_clients));
    });

    $app->get("/client_edit/{id}", function($id) use ($app) {
        $client = Client::find($id);
        return $app["twig"]->render("edit.html.twig", array('client' => $client));
    });

    $app->patch("/client_update/{id}", function($id) use ($app) {
        $client = Client::find($id);
        $client->update($_POST['new_client_name']);
        return $app["twig"]->render("editclient.html.twig", array('client' => $client));
    });


    $app->post("/client_delete_all", function() use ($app) {
        Client::deleteAll();
        return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll(), 'clients' => Client::getAll()));
    });



    return $app;
?>
