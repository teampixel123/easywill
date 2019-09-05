<?php
require('fpdf/fpdf.php');

class Myfpdf extends fpdf
{
function __construct(){
  parent::__construct();
  $ci=& get_instance();
}

}
 ?>
