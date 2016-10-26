<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database                 
?>
<?php  

                            include('koneksi.php');
                            $a = 0;
                            $sql   = mysqli_query($koneksi,"SELECT distinct tanggal  FROM t_gangguan order by tanggal ASC Limit 31") or die(mysql_error());
                            while( $data = mysqli_fetch_assoc( $sql ) ){
                              $tanggalggn[$a] =$data['tanggal'];                     
                            $a++;
                            $sql1   = mysqli_query($koneksi,"SELECT performansi  FROM t_gangguan where area='Rajawali 1' order by tanggal ASC") or die(mysql_error());
                            $b = 0;
                            while( $data1 = mysqli_fetch_assoc( $sql1 ) ){
                              $Prjw1[$b] = $data1['performansi'];                     
                            
                            $b++;
                            }
                            
                            $sql2   = mysqli_query($koneksi,"SELECT performansi  FROM t_gangguan where area='Rajawali 2' order by tanggal ASC") or die(mysql_error());        
                            $c = 0;
                            while( $data2 = mysqli_fetch_array( $sql2 ) ){
                            $Prjw2[$c] = $data2['performansi'];                 
                            $c++;
                            }
                            $d = 0;    
                            $sql3   = mysqli_query($koneksi,"SELECT performansi  FROM t_gangguan where area='Rajawali 3' order by tanggal ASC") or die(mysql_error());        
                            while( $data3 = mysqli_fetch_array( $sql3 ) ){
                            $Prjw3[$d] = $data3['performansi'];                 
                            $d++;
                            }
                            $e = 0;
                            $sql4   = mysqli_query($koneksi,"SELECT performansi  FROM t_gangguan where area='Rajawali 4' order by tanggal ASC") or die(mysql_error());        
                            while( $data4 = mysqli_fetch_array( $sql4 ) ){
                            $Prjw4[$e] = $data4['performansi'];                 
                            $e++;
                            }    
                            $f = 0;
                            $sql5   = mysqli_query($koneksi,"SELECT performansi  FROM t_gangguan where area='Rajawali 5' order by tanggal ASC") or die(mysql_error());        
                            while( $data5 = mysqli_fetch_array( $sql5 ) ){
                            $Prjw5[$f] = $data5['performansi'];                 
                            $f++;
                            } 
                        ?>
<html>
	<head>
		<!-- include file jquery.min.js dan higchart.js-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/highcharts.js"></script>
        <script src="js/exporting.js"></script>    


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Grafik penjualan smartphone </title>

<!-- Script Chart Performansi -->
<script type="text/javascript">
        //2)script untuk membuat grafik, perhatikan setiap komentar agar paham
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container', //letakan grafik di div id container
                //Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'column',  
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Performansi per teritori STO Rajawali',
                x: -20 //center
            },
            subtitle: {
                text: 'indihome 100% fiber',
                x: -20
            },
            xAxis: { //X axis menampilkan data bulan 
                categories: ['1', '2', '3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31']
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'Performansi per Teritori'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080' //warna dari grafik line
                }]
            },


            tooltip: { 
            //fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
            //akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            //series adalah data yang akan dibuatkan grafiknya,
		    series: [                        
                        //config.php adalah file koneksi database bagian ini dipakai 
                        //untuk mengambil data dari mysql
            {  
                name: 'Rajawali 1',  
				
                data: [/*<?php echo $Prjw1; ?>*/50,60,50,60,50,60,50]
            },
            {  
                name: 'Rajawali 2',  
				
                data: [/*<?php echo join($Prjw2); ?>*/60,70,60,70,60,70,60]
            },
            {  
                name: 'Rajawali 3',  
				
                data: [/*<?php echo join($Prjw3); ?>*/100,100,80,100,80,100,80]
            },
            {  
                name: 'Rajawali 4',  
				
                data: [/*<?php echo join($Prjw4); ?>*/60,70,60,70,60,70,60]
            },
            {  
                name: 'Rajawali 5',  
				
                data: [/*<?php echo join($Prjw5); ?>*/50,60,50,60,50,60,50]
            },

            <?php
}
?>
            ]
        });
    });
    
});


		</script>
	</head>
	<body>

<!--grafik akan ditampilkan disini -->
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<div id=link>

</div>
	</body>
</html>
<?php 
include("footer.php"); // memanggil file footer.php
?>