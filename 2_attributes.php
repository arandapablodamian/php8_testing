
//before in php 7
class PostsController
{
    /**
     * @Route("/api/posts/{id}", methods={"GET"})
     */
    public function get($id) { /* ... */ }
}


//now in php8
class PostsController
{
    #[Route("/api/posts/{id}", methods: ["GET"])]
    public function get($id) { /* ... */ }
}

/////example for doctrine exampĺe
 Here is a complex example of an object using Doctrine Annotations and the proposed Attributes side by side to implement the same thing:

<?php
use Doctrine\ORM\Attributes as ORM;
use Symfony\Component\Validator\Constraints as Assert;
 
<<ORM\Entity>>
/** @ORM\Entity */
class User
{
    /** @ORM\Id @ORM\Column(type="integer"*) @ORM\GeneratedValue */
    <<ORM\Id>><<ORM\Column("integer")>><<ORM\GeneratedValue>>
    private $id;
 
    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\Email(message="The email '{{ value }}' is not a valid email.")
     */
    <<ORM\Column("string", ORM\Column::UNIQUE)>>
    <<Assert\Email(array("message" => "The email '{{ value }}' is not a valid email."))>>
    private $email;
 
    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 120,
     *      max = 180,
     *      minMessage = "You must be at least {{ limit }}cm tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    <<Assert\Range(["min" => 120, "max" => 180, "minMessage" => "You must be at least {{ limit }}cm tall to enter"])>>
    <<ORM\Column(ORM\Column::T_INTEGER)>>
    protected $height;
 
    /**
     * @ORM\ManyToMany(targetEntity="Phonenumber")
     * @ORM\JoinTable(name="users_phonenumbers",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
     *      )
     */
    <<ORM\ManyToMany(Phonenumber::class)>>
    <<ORM\JoinTable("users_phonenumbers")>>
    <<ORM\JoinColumn("user_id", "id")>>
    <<ORM\InverseJoinColumn("phonenumber_id", "id", JoinColumn::UNIQUE)>>
    private $phonenumbers;
}
