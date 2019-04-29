<?PHP 
require('fpdf/fpdf.php');
class myPDF extends FPDF{
       function header(){
              $add1=$_POST['address1'];
              $add2=$_POST['address2'];
              $ville=$_POST['ville'];
              $zip=$_POST['zip'];
              $phone=$_POST['phone'];
              $type_livraison=$_POST['type_livraison'];
              $mode_payement=$_POST['mode_payement'];
        $this->SetFont("Arial","B",14);
              $this->Cell(0,10,"Facture des achats ",0,1,'C');
              $this->ln();
              $this->ln();
              $this->ln();
              $this->Cell(30,10,"Destination: ",0,1);
              $this->line(10,60,200,60);
              $this->ln(10);
              $this->Cell(70,10," addresse 1",0,0);
              $this->Cell(30,10,": {$add1} ",0,1);
              $this->Cell(70,10,"addresse2",0,0);
              $this->Cell(30,10,": {$add2} ",0,1);
              $this->Cell(70,10,"ville",0,0);
              $this->Cell(30,10,": {$ville} ",0,1);
              $this->Cell(70,10,"zip ",0,0);
              $this->Cell(30,10,": {$zip}",0,1);
              $this->Cell(70,10,"phone",0,0);
              $this->Cell(30,10,": {$phone} ",0,1);
              $this->Cell(70,10,"type de livraison",0,0);
              $this->Cell(30,10,": {$type_livraison} ",0,1);
              $this->Cell(70,10,"mode de payement",0,0);
              $this->Cell(30,10,": {$mode_payement} ",0,1);
              $this->ln(10);
              $this->line(155,200,195,200);
              $this->Cell(140,5,'',0,0);
              $this->Cell(35,110,"Signature",0,1,'C');
              $this->image('fpdf/logo.JPG',15,10);
       }}

       $pdf=new myPDF();
       $pdf->addPage();
       $pdf->output();
       ?>