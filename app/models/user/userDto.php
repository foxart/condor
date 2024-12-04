<?php

namespace models\user;
class UserDto
{
    public int $id;
    public string $email;
    public string $username;
    public string $password;
    public string $firstname;
    public string $lastname;
    public string $dob;  // Or \DateTime if you handle date objects
    public string $city;
    public string $zipcode;
    public string $address;
    public string $createdAt;  // Or \DateTime
    public int $country_id;
    public string $country_name;
    public string $country_code;
    public int $status_id;
    public string $status_name;

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
        $this->country_id = $data['country_id'];
        $this->country_name = $data['country_name'];
        $this->country_code = $data['country_code'];
        $this->status_id = $data['country_id'];
        $this->status_name = $data['status_name'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getDob(): string
    {
        return $this->dob;
    } // Consider returning \DateTime

    public function setDob(string $dob): void
    {
        $this->dob = $dob;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCountryId(): int
    {
        return $this->country_id;
    }

    public function setCountryId(int $country_id): void
    {
        $this->country_id = $country_id;
    }

    public function getCountryName(): string
    {
        return $this->country_name;
    }

    public function setCountryName(string $country_name): void
    {
        $this->country_code = $country_name;
    }

    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    public function setCountryCode(string $country_code): void
    {
        $this->country_code = $country_code;
    }

    public function getStatusId(): int
    {
        return $this->status_id;
    }

    public function setStatusId(int $status_id): void
    {
        $this->status_id = $status_id;
    }

    public function getStatusName(): string
    {
        return $this->status_name;
    }

    public function setStatusName(string $status_name): void
    {
        $this->status_name = $status_name;
    }
}
