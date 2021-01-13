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
//        $faker = Factory::create('fr_FR');
//
//        for($i=0; $i < 5; $i++) {
//            $user = new User();
//            $user->setPrenom($faker->unique(true)->firstName);
//            $user->setEmail($faker->unique(true)->email);
//            $user->setPassword($this->passwordEncoder->encodePassword($user,"mdp123"));
//            $user->setRoles(['ROLE_USER']);
//            $manager->persist($user);
//        }
        $admin = new User();
        $admin->setPrenom('Mohamed');
        $admin->setNom('Jemoui');
        $admin->setEmail('mohamed@email.fr');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, "admin123"));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setCreatedAt(new DateTime());
        $manager->persist($admin);

        $manager->flush();
    }
}