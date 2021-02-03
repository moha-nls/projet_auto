<?php


namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setPrenom('sandra');
        $user->setNom('Rosales');
        $user->setEmail('sandral@email.fr');
        $user->setPassword($this->passwordEncoder->encodePassword($user,"mdp123"));
        $user->setRoles(['ROLE_USER']);
        $user->setCreatedAt(new DateTime());
        $manager->persist($user);

        $admin = new User();
        $admin->setPrenom('Leonel');
        $admin->setNom('Rosales');
        $admin->setEmail('leonel@email.fr');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, "admin123"));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setCreatedAt(new DateTime());
        $manager->persist($admin);

        $manager->flush();
    }
}