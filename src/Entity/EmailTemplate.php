<?php

Namespace App\Entity;

use App\Repository\EmailTemplateRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Contract\Entity\BlameableInterface;
use Knp\DoctrineBehaviors\Model\Blameable\BlameableTrait;
use Knp\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletableTrait;

/**
 * @ORM\Entity(repositoryClass=EmailTemplateRepository::class)
 */
class EmailTemplate implements TimestampableInterface, BlameableInterface, SoftDeletableInterface
{
    use TimestampableTrait;
    use BlameableTrait;
    use SoftDeletableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }
}
