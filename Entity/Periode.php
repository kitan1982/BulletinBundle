<?php

namespace FormaLibre\BulletinBundle\Entity;

use Claroline\CursusBundle\Entity\CourseSession;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="FormaLibre\BulletinBundle\Repository\PeriodeRepository")
 * @ORM\Table(name="formalibre_bulletin_periode")
 */
class Periode
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $name;

    /**
     * @ORM\Column(name="start_date", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @ORM\Column(name="end_date", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $degre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annee;

    /**
     * @ORM\Column()
     */
    private $ReunionParent;

    /**
     * @ORM\Column()
     */
    private $template;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $onlyPoint;

    /**
     * @ORM\ManyToMany(
     *     targetEntity="Claroline\CursusBundle\Entity\CourseSession"
     * )
     * @ORM\JoinTable(name="formalibre_bulletin_periode_matieres")
     */
    protected $matieres;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $annee
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    /**
     * @return mixed
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * @param mixed $degre
     */
    public function setDegre($degre)
    {
        $this->degre = $degre;
    }

    /**
     * @return mixed
     */
    public function getDegre()
    {
        return $this->degre;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $ReunionParent
     */
    public function setReunionParent($ReunionParent)
    {
        $this->ReunionParent = $ReunionParent;
    }

    /**
     * @return mixed
     */
    public function getReunionParent()
    {
        return $this->ReunionParent;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $onlyPoint
     */
    public function setOnlyPoint($onlyPoint)
    {
        $this->onlyPoint = $onlyPoint;
    }

    /**
     * @return mixed
     */
    public function getOnlyPoint()
    {
        return $this->onlyPoint;
    }

    public function getMatieres()
    {
        return $this->matieres->toArray();
    }

    public function addMatiere(CourseSession $matiere)
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres->add($matiere);
        }

        return $this;
    }

    public function removeMatiere(CourseSession $matiere)
    {
        if ($this->matieres->contains($matiere)) {
            $this->matieres->removeElement($matiere);
        }

        return $this;
    }
}