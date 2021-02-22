<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity
*/
class Tag {
	/**
	* @Column(type="integer")
	* @Id
	* @GeneratedValue
	*/
	private $id;
	/**
	* @Column(type="string")
	*/
	private $name;
	/**
	* @ManyToMany*(targetEntity="Article", mappedBy="tag")
	*/
	private $articles;

	public function __construct(){
		$this->articles = new ArrayCollection; 
	}

	public function getId(){
		return $this ->id;
	}

	public function setId($value){
		$this ->id = $value;
	}

	public function getName(){
		return $this ->name;
	}

	public function setName($value){
		$this ->name = $value;
	}

	public function getArticles(){
		return $this->articles;
	}

}