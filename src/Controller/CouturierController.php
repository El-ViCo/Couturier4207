<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;

class CouturierController extends AbstractController
{
    /**
     * @Route("/couturier", name="couturier")
     */
    public function index(): Response
    {
        return $this->render('couturier/index.html.twig', [
            'controller_name' => 'COUTURIERController',
        ]);
    }
    /**
     * @Route("/couturier/pages/loginconfirm", name="loginconfirm")
     */
    public function loginconfirm(Request $request,EntityManagerInterface $manager): Response
    {
        $login = $request -> request -> get("exampleInputEmail1");
        $password = $request -> request -> get("password");
        $reponse = $manager -> getRepository(Utilisateur :: class) -> findOneBy([ 'login' => $login]);
        if ($reponse == NULL){
            $repons ="utilisateur inconnu";
             } 
        else{
             $code = $reponse -> getPassword();
             if ($code == $password){
                 $repons = "acces autorisé";
             }else {
                $repons = "MDP = PAS VALIDE";
             }
             
             }
             return $this->render('couturier/login.html.twig', [
                'Message' => $repons,
                'login' => $login,
            ]);
        }
    }