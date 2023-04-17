<?php
include "connection.php";
$sqlprovinsi="select id,nama_provinsi from provinsi  order by nama_provinsi asc ";
$resprovinsi   = mysqli_query($con,$sqlprovinsi);
$checkprovinsi = mysqli_num_rows($resprovinsi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>Detect Province/State using PHP Ajax </title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<script src='assets/js/jquery-1.10.1.min.js'></script>       
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		function pilihprovinsi(id_provinsi){
			if(id_provinsi!="-1"){
				loadData('kabupaten',id_provinsi);
				$("#kecamatan_dropdown").html("<option value='-1'>Pilih Kecamatan</option>");	
			}else{
				$("#kabupaten_dropdown").html("<option value='-1'>Pilih Kabupaten</option>");
				$("#kecamatan_dropdown").html("<option value='-1'>Pilih Kecamatan</option>");		
			}
		}

		function pilihkabupaten(id_kabupaten){
			if(id_kabupaten!="-1"){
				loadData('kecamatan',id_kabupaten);
			}else{
				$("#kecamatan_dropdown").html("<option value='-1'>Pilih Kecamatan</option>");		
			}
		}

		function loadData(loadType,loadId){
			var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
			$("#"+loadType+"_loader").show();
			$("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
			$.ajax({
				type: "POST",
				url: "loadData.php",
				data: dataString,
				cache: false,
				success: function(result){
					$("#"+loadType+"_loader").hide();
					$("#"+loadType+"_dropdown").html("<option value='-1'>Pilih "+loadType+"</option>");  
					$("#"+loadType+"_dropdown").append(result);  
				}
			});
		}
	</script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">
			Pusat Ilmu Secara Detil</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li class="clr1 active"><a href="index.html">Home</a></li>
				<li class="clr2"><a href="">Programming</a></li>
				<li class="clr3"><a href="">English</a></li>
			</ul>
		</div>
	</div>
</div>
</br></br></br></br>
<div class ="container">
	<div class="row">
			<div class="col-md-12">
			<h4 >Detecting Province </h4>
			</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php
			if($checkprovinsi > 0){
				?>
				<form role="form">
					<div class="form-group">
						
							<select class="form-control" onchange="pilihprovinsi(this.options[this.selectedIndex].value)">
								<option value="-1">Pilih Provinsi</option>
								<?php
								while($rowprovinsi=mysqli_fetch_array($resprovinsi)){
									?>
									<option value="<?php echo $rowprovinsi['id']?>"><?php echo $rowprovinsi['nama_provinsi']?></option>
									<?php
								}
								?>
							</select>
						
					</div>
					<div class="form-group">
						
							<select class="form-control" id="kabupaten_dropdown" onchange="pilihkabupaten(this.options[this.selectedIndex].value)">
								<option value="-1">Pilih Kabupaten</option>
							</select>
							<span id="state_loader"></span>
						
					</div>
					
					<div class="form-group">
						
							<select class="form-control" id="kecamatan_dropdown">
								<option value="-1">Pilih Kecamatan</option>
							</select>
							<span id="city_loader"></span>
						
					</div>
				</form>
				<?php
			}else{
				echo 'Data Provinsi tidak ditemukan';
			}
			?>
		</div>
	</div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
   <div class="container">
      <p class="navbar-text pull-left">Detailed Technology Center, Powered by <a href="http://ilmu-detil.blogspot.co.id/">Pusat Ilmu Secara Detil</a></p>
   </div>
</div>  
</body>
</html>