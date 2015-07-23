<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    //////////////////////////////////////////
    // Return a Lucky Number
    //////////////////////////////////////////
    public function numberAction()
    {
        $number = rand(0, 100);

        return new Response(
            '<html><body> '.
                '<a href="/lucky/doublenumber">Double Lucky</a>'.
                'Lucky number: '.$number.'<br>'.
            '</body></html>'
        );
    }

    /**
     * @Route("/lucky/doublenumber")
     */
    //////////////////////////////////////////
    // Return 2 Lucky Numbers
    //////////////////////////////////////////
    public function doubleNumberAction()
    {
        $number = rand(0, 100);

        return new Response(
            '<html><body> '.
                '<a href="/lucky/number">Lucky</a>'.
                'Lucky number: '.$number.'<br>'.
                'Lucky number: '.$number.
            '</body></html>'
        );
    }

    /**
     * @Route("/api/lucky/number")
     */
    ////////////////////////////////////////////
    // Return JSON Response in 2 different ways
    ////////////////////////////////////////////
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

//        return new Response(
//            json_encode($data),
//            200,
//            array('Content-Type' => 'application/json')
//        );

        return new JsonResponse($data);
    }

    /**
     * @Route("/lucky/number/{count}")
     */
    //////////////////////////////////////////
    // Do Multiple Lucky Numbers
    //////////////////////////////////////////
    public function multipleNumberAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

        return new Response(
            '<html><body>Lucky numbers: '.$numbersList.'</body></html>'
        );
    }

    //////////////////////////////////////////
    // Templating
    //////////////////////////////////////////
    /**
     * @Route("/lucky/number/template/{count}")
     */
    public function templateNumberAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

        $html = $this->container->get('templating')->render(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );

        return new Response($html);

        // render: a shortcut that does the same as above
//        return $this->render(
//            'lucky/number.html.twig',
//            array('luckyNumberList' => $numbersList)
    }
}
