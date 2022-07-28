<?php


namespace App\Entity;

use JsonSerializable;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Http\Client\ClientInterface;


class FormData implements JsonSerializable
{
    /**
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     *
     */
    private $email;

    /**
     * @Assert\NotBlank(
     *     message = "error message"
     * )
     * @Assert\Regex(
     *     pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$^",
     *     match = false,
     *     message = "Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"
     * )
     */
    private $password;

    /**
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @Assert\NotBlank
     */
    private $address2;
    /**
     * @Assert\NotBlank
     */
    private $city;

    /**
     * @Assert\NotBlank
     */
    private $zip;

    /**
     *
     */
    private $checkbox;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     */
    public function setAddress2($address2): void
    {
        $this->address2 = $address2;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getCheckbox()
    {
        return $this->checkbox;
    }

    /**
     * @param mixed $checkbox
     */
    public function setCheckbox($checkbox): void
    {
        $this->checkbox = $checkbox;
    }



    public function jsonSerialize()
    {

        return
            [
                'email' => $this->getEmail(),
                'password' => $this->getPassword(),
                'Address' => $this->getAddress(),
                'City' => $this->getCity(),
                'Zip' => $this->getZip()
            ];

    }

}