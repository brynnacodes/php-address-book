<?php

    class Contact {
        private $name;
        private $phone;
        private $address;

    function __construct($name, $phone, $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    function get($property)
    {
        return $this->$property;
    }

    function set($property, $value)
    {
        $this->$property = $value;
    }

    function save()
    {
        array_push($_SESSION["list_of_contacts"], $this);
    }

    static function getAll()
    {
        return $_SESSION["list_of_contacts"];
    }
  }

    class Address
    {
        private $street;
        private $city;
        private $state;

        function __construct($street, $city, $state)
        {
            $this->street = $street;
            $this->city = $city;
            $this->state = $state;
        }

        function get($property)
        {
            return $this->$property;
        }

        function set($property, $value)
        {
            $this->property = $value;
        }
    }
?>
