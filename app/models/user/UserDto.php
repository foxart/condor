<?php

namespace models\user;

use models\country\CountryDto;
use models\status\StatusDto;

class UserDto
{
    public int $id;
    public string $email;
    public string $username;
    public string $password;
    public string $firstname;
    public string $lastname;
    public string $dob;
    public string $city;
    public string $zipcode;
    public string $address;
    public string $createdAt;
    public CountryDto $country;
    public StatusDto $status;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'];
        $this->email = $data['email'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->dob = $data['dob'];
        $this->city = $data['city'];
        $this->zipcode = $data['zipcode'];
        $this->address = $data['address'];
        $this->createdAt = $data['created_at'];
        $this->country = new CountryDto([
            'id' => $data['country_id'],
            'name' => $data['country_name'],
            'code' => $data['country_code'],
        ]);
        $this->status = new StatusDto([
            'id' => $data['status_id'],
            'name' => $data['status_name'],
        ]);
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
        return $this->createdAt;
    }

    public function getCountry(): CountryDto
    {
        return $this->country;
    }

    public function getStatus(): StatusDto
    {
        return $this->status;
    }
}
