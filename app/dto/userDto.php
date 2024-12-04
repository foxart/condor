<?php

interface UserDtoInterface
{
    public function getId(): int;

    public function getEmail(): string;

    public function getUsername(): string;

    public function getPassword(): string;

    public function getFirstname(): string;

    public function getLastname(): string;

    public function getDob(): string;

    public function getCity(): string;

    public function getZipcode(): string;

    public function getAddress(): string;

    public function getCreatedAt(): string;

    public function getStatus(): string;

    public function getCountry(): string;
}

class UserDto implements  UserDtoInterface
{
    private int $id;
    private string $email;
    private string $username;
    private string $password;
    private string $firstname;
    private string $lastname;
    private string $dob;
    private string $city;
    private string $zipcode;
    private string $address;
    private string $created_at;
    private string $status;
    private string $country;

    public function __construct(
        int    $id, string $email, string $username, string $password, string $firstname, string $lastname,
        string $dob, string $city, string $zipcode, string $address, string $created_at, string $status, string $country
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->dob = $dob;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->address = $address;
        $this->created_at = $created_at;
        $this->status = $status;
        $this->country = $country;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getDob(): string
    {
        return $this->dob;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}
