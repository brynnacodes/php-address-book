<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/address_book.php";

    session_start();
    if (empty($_SESSION["list_of_contacts"])) {
        $_SESSION["list_of_jobs"] = [];
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        "twig.path" => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("addresses.html.twig");
    });

    $app->get("/contact_form", function() use ($app) {
        return $app["twig"]->render("contact_form.html.twig");
    });

    $app->get("/new_contact", function() {
      $my_contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);

    });

    return $app;
 ?>
