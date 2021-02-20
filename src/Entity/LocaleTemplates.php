<?php

namespace App\Entity;

use App\Repository\LocaleTemplatesRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Contract\Entity\BlameableInterface;
use Knp\DoctrineBehaviors\Model\Blameable\BlameableTrait;
use Knp\DoctrineBehaviors\Contract\Entity\SoftDeletableInterface;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletableTrait;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=LocaleTemplatesRepository::class)
 * @Vich\Uploadable
 */
class LocaleTemplates implements TimestampableInterface, BlameableInterface, SoftDeletableInterface
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
    private $locale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $workflow;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $documentStyle;

    /**
     * @ORM\OneToOne(targetEntity=EmailTemplate::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $QuoteEmail;

    /**
     * @ORM\OneToOne(targetEntity=EmailTemplate::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $NoQuoteEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ContactEmail;

    /**
     * @ORM\OneToOne(targetEntity=VariousFile::class, cascade={"persist"}, orphanRemoval=false)
     */
    private $HeaderImage;

    /**
     * @ORM\OneToOne(targetEntity=VariousFile::class, cascade={"persist"}, orphanRemoval=false)
     */
    private $FooterImage;

    /**
     * @ORM\OneToOne(targetEntity=VariousFile::class, cascade={"persist"}, orphanRemoval=false)
     */
    private $Brochure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWorkflow(): ?string
    {
        return $this->workflow;
    }

    public function setWorkflow(string $workflow): self
    {
        $this->workflow = $workflow;

        return $this;
    }

    public function getDocumentStyle(): ?string
    {
        return $this->documentStyle;
    }

    public function setDocumentStyle(string $documentStyle): self
    {
        $this->documentStyle = $documentStyle;

        return $this;
    }

    public function getQuoteEmail(): ?EmailTemplate
    {
        return $this->QuoteEmail;
    }

    public function setQuoteEmail(EmailTemplate $QuoteEmail): self
    {
        $this->QuoteEmail = $QuoteEmail;

        return $this;
    }

    public function getNoQuoteEmail(): ?EmailTemplate
    {
        return $this->NoQuoteEmail;
    }

    public function setNoQuoteEmail(EmailTemplate $NoQuoteEmail): self
    {
        $this->NoQuoteEmail = $NoQuoteEmail;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->ContactEmail;
    }

    public function setContactEmail(?string $ContactEmail): self
    {
        $this->ContactEmail = $ContactEmail;

        return $this;
    }

    public function getHeaderImage(): ?VariousFile
    {
        return $this->HeaderImage;
    }

    public function setHeaderImage(?VariousFile $HeaderImage): self
    {
        $this->HeaderImage = $HeaderImage;

        return $this;
    }

    public function getFooterImage(): ?VariousFile
    {
        return $this->FooterImage;
    }

    public function setFooterImage(?VariousFile $FooterImage): self
    {
        $this->FooterImage = $FooterImage;

        return $this;
    }

    public function getBrochure(): ?VariousFile
    {
        return $this->Brochure;
    }

    public function setBrochure(?VariousFile $Brochure): self
    {
        $this->Brochure = $Brochure;

        return $this;
    }
}
