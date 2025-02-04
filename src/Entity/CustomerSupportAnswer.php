<?php

declare(strict_types=1);

namespace Arobases\SyliusCustomerSupportPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity
 * @ORM\Table(name="arobases_customer_support_answer")
 */
class CustomerSupportAnswer implements ResourceInterface
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="Arobases\SyliusCustomerSupportPlugin\Entity\CustomerSupport",
     *     inversedBy="customerSupportAnswers",
     *     fetch="EXTRA_LAZY",
     *      cascade={"persist", "remove"}
     * )
     */
    protected ?CustomerSupport $customerSupport = null;

    /**
     * @ORM\Column(type="text")
     */
    protected string $message;

    /**
     * @ORM\Column(type="text", length=70)
     */
    protected string $author;

    /**
     * @ORM\Column(type="text", length=70, nullable=true)
     */
    protected ?string $adminName;

    /**
     * @ORM\Column(type="string", length=511, nullable=true)
     */
    protected ?string $filePath = null;

    protected ?File $file = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getCustomerSupport(): ?CustomerSupport
    {
        return $this->customerSupport;
    }

    public function setCustomerSupport(?CustomerSupport $customerSupport): void
    {
        $this->customerSupport = $customerSupport;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): void
    {
        $this->filePath = $filePath;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): void
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAdminName(): ?string
    {
        return $this->adminName;
    }

    /**
     * @param string $adminName
     */
    public function setAdminName(?string $adminName): void
    {
        $this->adminName = $adminName;
    }
}
