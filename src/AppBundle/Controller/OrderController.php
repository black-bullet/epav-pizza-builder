<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\TableType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * OrderController class
 *
 * @author Yevgeniy Zholkevskiy <blackbullet@i.ua>
 */
class OrderController extends Controller
{
    /**
     * Choice table action
     *
     * @param Request $request Request
     *
     * @return Response
     *
     * @Route("/", name="choice_table_order");
     */
    public function choiceTableAction(Request $request)
    {
        $table = new TableType();

        $form = $this->createForm($table);
        $form->handleRequest($request);

        //        if ($form->isValid()) {
        //            $data = $form->getData();
        //
        //            //            $this->redirectToRoute($this->generateUrl('create_order', [
        //            //                'table' => $data['name'],
        //            //            ]));
        ////            $this->redirect($this->generateUrl('create_order', [
        ////                'table' => $data['name'],
        ////            ]));
        //            $this->redirect($this->generateUrl('create_order').'/'.$data['name']);
        //        }

        return $this->render('AppBundle:order:choice_table.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Choice table action
     *
     * @param int $table Table
     *
     * @return Response
     *
     * @Route("/create/{table}", name="create_order");
     */
    public function createAction($table)
    {
        $ingredients = $this->getDoctrine()->getRepository('AppBundle:Ingredient')->findAll();
        $presets     = $this->getDoctrine()->getRepository('AppBundle:Preset')->findAll();

        return $this->render('AppBundle:order:create.html.twig', [
            'ingredients' => $ingredients,
            'presets'     => $presets,
        ]);
    }
}
