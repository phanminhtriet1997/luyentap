<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Các bài toán kinh điển</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" href="images/IconMT.png">

	<style type="text/css" media="screen">
	fieldset{
		margin: 15px 0px; 
	}
	fieldset div{
		text-align: center;
	}
	legend{
		size: 40px;
		font-weight: bold;
	}
	h4{
		display: inline;
	}
	.buttonViewSource {
		background-color: #008CBA;
		border: none;
		color: white;
		padding: 5px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		border-radius: 8px;
		-webkit-transition-duration: 0.4s; /* Safari */
		transition-duration: 0.4s;
		cursor: pointer;
	}
	.buttonViewSource:hover {
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}

	input[type=submit]{
		background-color: #f44336; /* Green */
		border: none;
		color: white;
		padding: 5px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 14px;
		border-radius: 8px;
		-webkit-transition-duration: 0.4s; /* Safari */
		transition-duration: 0.4s;
		cursor: pointer;
	}
	input[type=submit]:hover {
		background-color: #f44336; /* Green */
		color: white;
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
	
</style>

<script type="text/javascript">	
	window.onload = function(){
		var btn_viewSource = document.getElementById('buttonClick');
		var img_viewSource = document.getElementById('BtnImg');
		var display = 0;
		btn_viewSource.onclick = ShowImg;
		function ShowImg(){
			if (display==0) {
				img_viewSource.setAttribute('style','display:block');	
				btn_viewSource.innerHTML = "Hide source";		
				display =1;				
			}
			else{
				img_viewSource.setAttribute('style','display:none');	
				btn_viewSource.innerHTML = "View source";		
				display =0;	
			}
		}	
	}
</script>

</head>
<body >
	<?php //Header + Menu
	include("template/header.php"); 
	?>
	
	<div class="content">
		<div class="sub_content">
			




			<?php 
			if (isset($_POST['sbm_tuoi']) && isset($_POST['input_tuoi'])) {

				$namSinh = $_POST['input_tuoi'];
				$namHienTai = date("Y");

				if ($namSinh>$namHienTai) {
					$tuoi = -1;
				}
				elseif ($namSinh >0) {
					$tuoi = $namHienTai - $namSinh;
				}
			}
			?>
			<fieldset>
				<legend>Tính tuổi</legend>
				<form action="" method="post">
					<span>Nhập năm sinh của bạn: </span><input type="number" name="input_tuoi"/>
					<input type="submit" name="sbm_tuoi" value="Tính tuổi" />
					<span class="buttonViewSource" ><span id="buttonClick1">View source</span></span>
				</form>
				<H4>Kết quả:</H4>
				<span style="color: red">
					<?php 
					if (isset($tuoi)) {
						if ($tuoi==-1) {
							echo "Năm sinh của bạn lớn hơn năm hiện tại. Bạn là người đến từ tương lai.";
						}
						else{
							echo "Bạn đã được $tuoi tuổi rồi!";
						}
					}
					?></span>

					<div id="BtnImg1" style="display: none;"><img src="images/CodeTinhTuoi.PNG" alt="Tính Tuổi"></div>
				</fieldset>
				<script type="text/javascript">	
					var btn_viewSource1 = document.getElementById('buttonClick1');
					var img_viewSource1 = document.getElementById('BtnImg1');
					var display = 0;
					btn_viewSource1.onclick = ShowImg;
					function ShowImg(){
						if (display==0) {
							img_viewSource1.setAttribute('style','display:block');	
							btn_viewSource1.innerHTML = "Hide source";		
							display =1;				
						}
						else{
							img_viewSource1.setAttribute('style','display:none');	
							btn_viewSource1.innerHTML = "View source";		
							display =0;	
						}				
					}
				</script>




				<!--1km đầu tiên giá 15000đ..........Từ km thứ 2 đến giá 13500đ.........Từ km thứ 6 trở đi giá 11000đ......Nếu số km > 120 km sẽ được giảm 10% trên tổng số tiền.-->
				<?php 
				if (isset($_GET['sbm_taxi']) && $_GET['input_km']>=0) {
				$soKm = intval($_GET['input_km']); //convert sang kiểu int

				if ($soKm <= 1) {
					$tongTien = $soKm*15000;
				}
				elseif ($soKm >1 && $soKm <=5) {
					$tongTien = 15000+ ($soKm-1)*13500;
				}
				elseif ($soKm >5) {
					$tongTien = 15000 + 13500*4 + ($soKm-5)*11000;
					if ($soKm > 120) {
						$tongTien-=$tongTien*0.1;
					}					
				}
			}
			?>
			<fieldset>
				<legend>Tính tiền Taxi</legend>
				<form action="" method="get" accept-charset="utf-8">
					<span>Số km đi được: </span><input type="number" name="input_km"/>
					<input type="submit" name="sbm_taxi" value="Tính số tiền" />
					<span class="buttonViewSource" ><span id="buttonClick2">View source</span></span>
				</form>	
				<H4>Kết quả tổng số tiền:</H4>
				<span style="color: red">
					<?php 
					if (isset($tongTien)) {
						echo number_format($tongTien)." vnđ";
					}
					?>
				</span>

				<div id="BtnImg2" style="display: none;"><img src="images/CodeTinhTienTaxi.PNG" alt="Tính tiền taxi"></div>
			</fieldset>
			<script type="text/javascript">	
				var btn_viewSource2 = document.getElementById('buttonClick2');
				var img_viewSource2 = document.getElementById('BtnImg2');
				var display = 0;
				btn_viewSource2.onclick = ShowImg;
				function ShowImg(){
					if (display==0) {
						img_viewSource2.setAttribute('style','display:block');	
						btn_viewSource2.innerHTML = "Hide source";		
						display =1;				
					}
					else{
						img_viewSource2.setAttribute('style','display:none');	
						btn_viewSource2.innerHTML = "View source";		
						display =0;	
					}				
				}
			</script>



			<?php 
			if (isset($_POST['sbm_tongNguyen'])) {
				$soNguyen = $_POST['input_soNguyen'];
				$sum = 0;
				while ($soNguyen != 0) {
					$soCuoi = $soNguyen%10; //Chia lấy dư để lấy ra số cuối cùng để tính tổng
					$soNguyen=$soNguyen/10; // Chia lấy nguyên để lấy ra phần đã bở đi số cuối
					$sum+=$soCuoi;
				}
			}
			?>
			<fieldset>
				<legend>Tính tổng của một số nguyên</legend>
				<form action="" method="post" accept-charset="utf-8">
					<span>Nhập một số nguyên: </span><input type="number" name="input_soNguyen"/>
					<input type="submit" name="sbm_tongNguyen" value="Tổng số nguyên" />
					<span class="buttonViewSource" ><span id="buttonClick3">View source</span></span>
				</form>
				<H4>Kết quả tổng của một số nguyên:</H4>
				<span style="color: red">
					<?php 
					if (isset($_POST['sbm_tongNguyen'])) {
						echo $sum;
					}
					?>
				</span>

				<div id="BtnImg3" style="display: none;"><img src="images/CodeTinhTongSoNguyen.PNG" alt="Tính tổng số nguyên"></div>
			</fieldset>
			<script type="text/javascript">	
				var btn_viewSource3 = document.getElementById('buttonClick3');
				var img_viewSource3 = document.getElementById('BtnImg3');
				var display = 0;
				btn_viewSource3.onclick = ShowImg;
				function ShowImg(){
					if (display==0) {
						img_viewSource3.setAttribute('style','display:block');	
						btn_viewSource3.innerHTML = "Hide source";		
						display =1;				
					}
					else{
						img_viewSource3.setAttribute('style','display:none');	
						btn_viewSource3.innerHTML = "View source";		
						display =0;	
					}				
				}
			</script>













		</div>
	</div>

	<?php 
	include("template/footer.php");
		//Back to TOP
	include("template/goTop.php"); 
	?>
</body>
</html>