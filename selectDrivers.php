<?php
include('header.php');
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
<div class="panel panel-default">
		<div class="panel-heading">
  <div class="panel panel-primary">
    <div class="panel-heading"><strong>LIST OF DRIVERS<form action="selectStudent.php" method="GET" ></div></strong>
  <div class="wrapper">
    <div class="panel-body">
    	<table class="table">
    		<th>No</th>
    		<TH>First name</TH>
    		<th>Last name</th>
    		<th>Identity</th>
    		<th>Category</th>
    		<th>Licence Drive</th>
    		<th>Car Plack</th>
    		<?php

    		$query=(mysqli_query($conn,"SELECT DISTINCT drivers.ID,drivers.f_name,drivers.l_name,registration.licence_drive_id,registration.plack,registration.category from drivers
    			inner join registration ON drivers.ID = registration.ID
    			
    			
    			

    			"))or die(mysqli_error($conn));
    		$a=0;
    		while ($row=mysqli_fetch_assoc($query)) {
    			$a++;
    			?>
    			<tr>
    				<td><?=$a;?></td>
    				<td><?=$row['f_name']?></td>
    				<td><?=$row['l_name']?></td>
    				<td><?=$row['ID']?></td>
    				<td><?=$row['category']?></td>
    				<td><?=$row['licence_drive_id']?></td>
    				<td><?=$row['plack']?></td>
    			</tr>
    			<?php
    		}
    		?>
    	</table>

    </div>
</div>
</form>
</center>
<script type="text/javascript" src="/path/to/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/path/to/jquery.tableexport.js"></script>
<link href="js/tableexport.css" rel="stylesheet">
<script src="//code.jquery.com/js/jquery.min.js"></script>
<script src="js/FileSaver.js"></script>
<script src="js/tableexport.js"></script>
<script src="js/Blob.js"></script>
<script src="js/Export2Excel.js"></script>

<script src="js/xls.core.min.js"></script>
<style type="text/css">
  
  /* [String] column separator, [default: ","] */
.top,
.head {
    caption-side: top;
}

.bottom {
    caption-side: bottom;
}
</style>
<script type="text/javascript">
$("table").tableExport({
    bootstrap: true
});
</script>
<script type="text/javascript">
/*$("table").tableExport({

    separator: ",",                         // [String] column separator, [default: ","]
    headings: true,                         // [Boolean], display table headings (th elements) in the first row, [default: true]
    buttonContent: "Export",                // [String], text/html to display in the export button, [default: "Export file"]
    addClass: "",                           // [String], additional button classes to add, [default: ""]
    defaultClass: "btn",                    // [String], the default button class, [default: "btn"]
    defaultTheme: "btn-default",            // [String], the default button theme, [default: "btn-default"]
    type: "csv",                            // [xlsx, csv, txt], type of file, [default: "csv"]
    fileName: "export",                     // [id, name, String], filename for the downloaded file, [default: "export"]
    position: "bottom",                     // [top, bottom], position of the caption element relative to table, [default: "bottom"]
    stripQuotes: true  
    bootstrap: true                     // [Boolean], remove containing double quotes (.txt files ONLY), [default: true]
});*/
</script>
</body>
</html>