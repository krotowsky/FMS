<?php


namespace App\Controller;


use App\Entity\Categorie;
use App\Entity\Pracownik;
use App\Form\PracownikFormType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PracownikController extends BaseController
{

        private $pracownikRepository;
        private $entityManager;

    public function __construct(CategorieRepository $pracownikRepository,EntityManagerInterface $entityManager)
    {
        $this->pracownikRepository = $pracownikRepository;
        $this->entityManager = $entityManager;
    }


    /**
    * @Route("/admin/pracownik",name="app_admin_pracownik")
    * @IsGranted("ROLE_WRITER")
    */
    public function pracownikIndex(){
        $items = $this->entityManager->getRepository(Pracownik::class)->findAll();
        return $this->render("admin/pracownik/pracownik.html.twig",["items"=>$items]);
    }

    /**
     * @Route("/admin/pracownik/new",name="app_admin_pracownik_new")
     * @IsGranted("ROLE_WRITER")
     */
    public function newPracownik(Request $request){
        $form = $this->createForm(PracownikFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            /** @var  Pracownik $pracownik */
            $pracownik = $form->getData();
            $newPracownik = new Pracownik();
            $newPracownik->setImie($pracownik['imie']);
            $newPracownik->setNazwisko($pracownik['nazwisko']);
            $newPracownik->setPESEL($pracownik['pesel']);
            $newPracownik->setStanowisko($pracownik['stanowisko']);
            $this->entityManager->persist($newPracownik);
            $this->entityManager->flush();
            $this->addFlash("success","Pracownik został utworzony.");
            return $this->redirectToRoute("app_admin_pracownik");

        }
        return $this->render("admin/pracownik/pracownikform.html.twig",["pracownikForm"=>$form->createView()]);
    }

}
