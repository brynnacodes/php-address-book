<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/address_book.php";

    session_start();
    if (empty($_SESSION["list_of_contacts"])) {
        $_SESSION["list_of_contacts"] = [];
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        "twig.path" => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {
        $contact_array = Contact::getAll();

        return $app["twig"]->render("contact_form.html.twig", array("contacts" => $contact_array));
    });

    $app->post("/new_contact", function() use ($app) {
        $my_address = new Address($_POST['address-street'], $_POST['address-city'], $_POST['address-state']);
        $my_contact = new Contact($_POST['name'], $_POST['phone'], $_POST['email'], $my_address);
        $my_contact->save();

        return $app["twig"]->render("addresses.html.twig", ["contact" => $my_contact]);
    });

    $app->post("delete_tasks", function() use ($app) {
        Contact::deleteAll();

        return $app["twig"]->render("delete.html.twig");
    });

    return $app;
 ?>
