<?php
if(isset($_REQUEST['ok'])){
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("Tablica.xml");
		
	$rootTag = $xml->getElementsByTagName("document")->item(0);
	$upisTag = $xml->createElement("upis");
		
	$nameTag = $xml->createElement("name",$_REQUEST['name']);
	$dateTag = $xml->createElement("date",$_REQUEST['date']);
	$activityTag = $xml->createElement("activity",$_REQUEST['activity']);
	$timeTag = $xml->createElement("time",$_REQUEST['time']);
	$lenghtTag = $xml->createElement("lenght",$_REQUEST['lenght']);
	
	$upisTag->appendChild($nameTag);
	$upisTag->appendChild($dateTag);
	$upisTag->appendChild($activityTag);
	$upisTag->appendChild($timeTag);
	$upisTag->appendChild($lenghtTag);
	
	$rootTag->appendChild($upisTag);
	$xml->save("Tablica.xml");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso18.css" /> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <!-- <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Georgia, serif; color: #17b762}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: #17b762 !important;} .bootstrap-iso .btn-custom{background: #17b762} .bootstrap-iso .btn-custom:hover{background: #03a34e;}.bootstrap-iso .outline, .bootstrap-iso .outline:focus{background-color: transparent; border: 2px solid #17b762} .bootstrap-iso .outline:hover{background-color: transparent; border: 2px solid#3fdf8a; color: #3fdf8a !important}.bootstrap-iso .form-control:focus { border-color: #17b762; -webkit-box-shadow: none; box-shadow: none;} .bootstrap-iso .has-error .form-control:focus{-webkit-box-shadow: none; box-shadow: none;} .asteriskField{color: red;}.bootstrap-iso form .input-group-addon {color:#17b762; background-color: #ffffff; border-radius: 4px; padding-left:12px}</style>
   --> <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <title>BudiAktivan</title>

	<style>
	.help-block {
	  font-size: 70%;
	  color: red;
	}
	</style>
	
  </head>

<!-- Navigacija -->
<nav class="navbar navbar-expand-lg bg-dark text-white">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Budi Aktivan</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="Unos.php">Unesi aktivnost <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="Tablica.xml">Pregled podatke</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>

<!-- Unos podataka -->

<div class="container">
    <div class="bootstrap-iso">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-sm-6 col-xs-12 mx-auto">
                <h1 class="mb-5 text-center">Unesite tražene podatke</h1>

                    <form action="Unos.php" class="form-horizontal" method="POST">

                        <!-- Podaci korisnika-->
                        <div class="form-group ">
                            <label for="korisnik" class="control-label col-sm-3 requiredField" for="name">
                            Ime i Prezime
                            <span class="asteriskField">*</span>
                            </label>
                        <div class="col-sm-8">
                            <input title='Unesi ime i prezime' class="form-control" id="name" name="name" type="text"/>
                            <span class="help-block" id="h1">
                                Upi&scaron;ite ime i prezime
                            </span>
                        </div>
                        </div>

                        <!-- Datum aktivnosti -->
                        <div class="form-group">
                            <label for="datum" class="control-label col-sm-3 requiredField">
                            Datum
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar-plus-o">
                                    </i>
                                    </div>
                                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
									
								</div>
								<span class="help-block" id="h2">Odaberite datum aktivnosti</span>
                            </div>
                        </div>
                        
                        <!-- Vrsta aktivnosti-->
                        <div class="form-group">
                        <label for="activity" class="control-label col-sm-3 requiredField" >
                        Aktivnost
                            <span class="asteriskField">
                                *
                            </span>
                        </label>
                        
                        <div class="col-sm-8">
							<select class="select form-control" id="activity" name="activity">
								<option value="BrzoHodanje">Brzo hodanje</option>
								<option value="Trcanje">Trčanje</option>
								<option value="VoznjaBicikla">Vožnja bicikla</option>
								<option value="Rolanje">Rolanje</option>
								<option value="Planinarenje">Planinarenje</option>
								<option value="Setnja">Šetnja</option>
							</select> 
							<span class="help-block" id="h3">Odaberite aktivnost</span>
						</div>
                        </div>
                        <!-- Trajanje aktivnosti -->

                        <div class="form-group ">
                            <label for="trajanje" class="control-label col-sm-3 requiredField" >
                            Trajanje
                            <span class="asteriskField">
                                *
                            </span>
                            </label>
                        <div class="col-sm-8">
                            <input title='Unesite trajanje u minutama' class="form-control" id="time" name="time" type="text"/>
							<span class="help-block" id="h4">Unesite trajanje aktivnosti u minutima</span>
						</div>
                        </div>
                        <!-- Dužina u kilometrima -->
                        <div for="duzina" class="form-group ">
                            <label class="control-label col-sm-3 requiredField" >
                            Dužina
                            <span class="asteriskField">
                                *
                            </span>
                            </label>
                            <div class="col-sm-8">
                                <input title='Unesite dužinu u kilometrima' class="form-control" id="lenght" name="lenght" type="text"/>
                                <span class="help-block" id="h5">
                                    Unesite dužinu u kilometrima
                                </span>
                            </div>
                        </div>

                        
                        <button type="submit" name="ok" class="btn btn-primary float-right mt-4">Zapiši u XML</button>
                        
                    </form>

                </div>
            </div>    
        </div>
    </div>
 </div>

    


 <div class="fixed-bottom">
 <footer class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Copyright &copy; Your Website</small>
    </div>
  </footer>

 </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
  </body>
 </div>
</html>