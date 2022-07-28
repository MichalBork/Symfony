<?php

namespace App\Controller;

use App\Entity\FormData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class DataFromFormController extends AbstractController
{

    private $validator;
    /**
     * DataFromFormController constructor.
     */
    public function __construct(ValidatorInterface $validator)
    {
            $this->validator = $validator;
    }


    /**
     * @Route("/form", name="app_data_from_form")
     */

    public function index(){

        return $this->render(
            'data_from_form/index.html.twig',
            [
                'controller_name' => 'DataFromFormController',
            ]
        );
    }

    /**
     * @Route("/formValidate", name="app_data_from_formValidate")
     */
    public function RequestAndValidate(Request $request): Response
    {
        $a = new FormData();

        $a->setEmail($request->query->get('inputEmail4'));
       $a->setPassword($request->query->get('inputPassword4'));
        $a->setAddress($request->query->get('inputAddress'));
        $a->setAddress2($request->query->get('inputAddress2'));
        $a->setCity($request->query->get('inputCity'));
        $a->setZip($request->query->get('inputZip'));
        $errors = $this->validator->validate($a);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $b = $a->jsonSerialize();


        return $this->render(
            'json_response/index.html.twig',
            [
                'data' => $b,
            ]
        );
    }

    }









