<?php

namespace App\DataFixtures;

use App\Entity\Empresa;
use App\Entity\Candidat;
use App\Entity\Oferta;
use DateTime;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $emp1=new Empresa();
        $emp1->setCorreu("a18aleest@inspedralbes.cat")
        ->setLogo("logo.png")->setTipus("tecnico");
        $manager->persist($emp1);

        $of1= new Oferta();
        $of1->setDataPub(new DateTime())
        ->setDescripcio("Desenvolupament Web")
        ->setEmpresa($emp1);

        $manager->persist($of1);

        $ca1= new Candidat();
        $ca1->setNom("Antonio")
        ->setCognoms("Escobar")
        ->setTelefon(1111)
        ->addOferta($of1);


        $manager->persist($ca1);


        $manager->flush();
    }
}
