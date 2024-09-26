<?php
namespace App\Controller;

use App\Helpers;
use Exception;
use Random\RandomException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    /**
     * @throws RandomException
     * @throws Exception
     */
    #[Route('/')]
    public function number(Helpers $helpers): Response
    {
        $number = random_int(0, 100);

        $helpers->render('home.index', ['title' => 'This is a test', 'number' => $number]);
        return new Response();
    }
}