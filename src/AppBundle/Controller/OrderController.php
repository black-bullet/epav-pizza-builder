<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Preset;
use AppBundle\Form\Type\TableType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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

    /**
     * Ajax for ingredients in preset
     *
     * @param Request $request Request
     *
     * @throws BadRequestHttpException
     *
     * @return Preset[]
     *
     * @Route("/preset-ingredients", name="preset-ingredients-order")
     */
    public function ajaxPresetIngredient(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Не правильний запит');
        }

        $em = $this->getDoctrine()->getManager();

        $ingredientsId = [];
        $preset        = $request->query->get('preset');
        $preset        = $em->getRepository('AppBundle:Preset')->find($preset);
        $ingredients   = $em->getRepository('AppBundle:Ingredient')->findIngredientByPreset($preset);

        /** @var Ingredient $ingredient */
        foreach ($ingredients as $ingredient) {
            $ingredientsId[] = $ingredient->getId();
        }

        return new JsonResponse([
            'status'      => true,
            'message'     => 'Success',
            'ingredients' => $ingredientsId,
        ]);
    }

    /**
     * Ajax price for pizza
     *
     * @param Request $request Request
     *
     * @throws BadRequestHttpException
     *
     * @return float
     *
     * @Route("/pizza-price", name="pizza-price-order")
     */
    public function ajaxPizzaPizza(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('Не правильний запит');
        }

        $ingredients = $request->query->get('ingredients');
        $cakeSize    = $request->query->get('cakeSize');

        $price = $this->getPricePizza($ingredients, $cakeSize);

        return new JsonResponse([
            'status'  => true,
            'message' => 'Success',
            'price'   => $price,
        ]);
    }

    /**
     * Return price for pizza
     *
     * @param [] $ingredients Ingredients
     * @param string $cakeSize Cake size
     *
     * @todo  Transfer to service
     */
    private function getPricePizza(array $ingredients, $cakeSize)
    {
        $price = 0;
        $em    = $this->getDoctrine()->getManager();

        //@todo transfer to repository
        /** @var Ingredient $ingredient */
        foreach ($ingredients as $ingredient) {
            $element = $em->getRepository('AppBundle:Ingredient')->findOneBy([
                'id' => $ingredient,
            ]);

            switch ($cakeSize) {
                case 'small':
                    $price += $element->getPriceSmall();
                    break;
                case 'medium':
                    $price += $element->getPriceMedium();
                    break;
                case 'large':
                    $price += $element->getPriceLarge();
                    break;
            }
        }

        return $price;
    }
}
