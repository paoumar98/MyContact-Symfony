<?php
namespace App\Entity;

class ContactSearch {

    /**
     * @var string|null
     */

    private $findContactByPrenom;

    /**
     * @var string|null
     */
    private $findContactByNom;

    /**
     * @var integer|null
     */
    private $findContactByNumero;

    /**
     * @return string|null
     */
    public function getFindContactByPrenom(): ?string
    {
        return $this->findContactByPrenom;
    }

    /**
     * @param string|null $findContactByPrenom
     * @return ContactSearch
     */
    public function setFindContactByPrenom(string $findContactByPrenom): ContactSearch
    {
        $this->findContactByPrenom = $findContactByPrenom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFindContactByNom(): ?string
    {
        return $this->findContactByNom;
    }

    /**
     * @param string|null $findContactByNom
     * @return ContactSearch
     */
    public function setFindContactByNom(string $findContactByNom): ContactSearch
    {
        $this->findContactByNom = $findContactByNom;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFindContactByNumero(): ?int
    {
        return $this->findContactByNumero;
    }

    /**
     * @param int|null $findContactByNumero
     * @return ContactSearch
     */
    public function setFindContactByNumero(int $findContactByNumero): ContactSearch
    {
        $this->findContactByNumero = $findContactByNumero;
        return $this;
    }



}