<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM news where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	
	<p>Title: <b><large><?php echo ucwords($title) ?></large></b></p>
	<p>Date Created: <b><?php echo ucwords($date_created) ?></b></p>
	<hr class="divider">
	<?php echo html_entity_decode($content) ?>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-md-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<style>
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none;
	}
	#uni_modal .modal-footer.display {
		display: block;
	}
</style>
