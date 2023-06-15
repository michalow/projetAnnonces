<?php

class Annonce extends Model
{
    private $id;
    private $title;
    private $description;
    private $duration;
    private $priceProduct;
    private $priceAnnoncement;
    private $dateValidate;
    private $endOfPublication;
    private $dateSale;
    private $state;
    private $buyer;

public function __construct
($id,$title,$description,$duration,$priceProduct,$priceAnnoncement,$dateValidate,$endOfPublication,$dateSale,$state,$buyer)
{
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->duration = $duration;
    $this->priceProduct = $priceProduct;
    $this->priceAnnoncement = $priceAnnoncement;
    $this->dateValidate = $dateValidate;
    $this->endOfPublication = $endOfPublication;
    $this->dateSale = $dateSale;
    $this->state = $state;
    $this->buyer = $buyer;
} 
}
?>