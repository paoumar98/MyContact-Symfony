<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Userfixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */


    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user  =new User();
        $user->setUsername('papou');
        $user->setPassword($this->encoder->encodePassword($user,'passer'));

        $manager->persist($user);
        $manager->flush();
    }
}
