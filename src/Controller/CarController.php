<?php


namespace App\Controller;


use App\Entity\Categorie;
use App\Entity\Flota;
use App\Entity\Pracownik;
use App\Form\FlotaFormType;
use App\Form\PracownikFormType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends BaseController
{

        private $gruszkaRepository;
        private $entityManager;

    public function __construct(CategorieRepository $pracownikRepository,EntityManagerInterface $entityManager)
    {
        $this->pracownikRepository = $pracownikRepository;
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/admin/flota",name="app_admin_flota")
     * @IsGranted("ROLE_WRITER")
     */
    public function flotaIndex(){
        $items = $this->entityManager->getRepository(Flota::class)->findAll();
        return $this->render("admin/flota/flota.html.twig",["items"=>$items]);
    }

    /**
    * @Route("/admin/flota/gruszki",name="app_admin_flota_gruszki")
    * @IsGranted("ROLE_WRITER")
    */
    public function gruszkaIndex(){
        $items = $this->entityManager->getRepository(Flota::class)->findBy(
            [
                'typ' => 'gruszka'
            ]
        );
        return $this->render("admin/flota/flota.html.twig",["items"=>$items]);
    }

    /**
     * @Route("/admin/flota/pompy",name="app_admin_flota_pompy")
     * @IsGranted("ROLE_WRITER")
     */
    public function pompaIndex(){
        $items = $this->entityManager->getRepository(Flota::class)->findBy(
            [
                'typ' => 'pompa'
            ]
        );
        return $this->render("admin/flota/flota.html.twig",["items"=>$items]);
    }

    /**
     * @Route("/admin/flota/pompogruszki",name="app_admin_flota_pompogruszki")
     * @IsGranted("ROLE_WRITER")
     */
    public function pompogruszkaIndex(){
        $items = $this->entityManager->getRepository(Flota::class)->findBy(
            [
                'typ' => 'pompogruszka'
            ]
        );
        return $this->render("admin/flota/flota.html.twig",["items"=>$items]);
    }

    /**
     * @Route("/admin/flota/new",name="app_admin_flota_new")
     * @IsGranted("ROLE_WRITER")
     */
    public function newPracownik(Request $request){
        $form = $this->createForm(FlotaFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            /** @var  Flota $flota */
            $flota = $form->getData();
            $newObj = new Flota();
            $newObj->setMarka($flota['marka']);
            $newObj->setModel($flota['model']);
            $newObj->setNumer($flota['numer']);
            $newObj->setVin($flota['vin']);
            $newObj->setTyp($flota['typ']);
            $newObj->setRokProdukcji($flota['rok_produkcji']);
            $newObj->setPrzebieg($flota['przebieg']);
            $this->entityManager->persist($newObj);
            $this->entityManager->flush();
            $this->addFlash("success","Pojazd został utworzony");
            return $this->redirectToRoute("app_admin_flota");

        }
        return $this->render("admin/flota/flotaform.html.twig",["flotaForm"=>$form->createView()]);
    }

}
