<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>NEWS</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right"  id="new_news">
					<i class="fa fa-plus"></i> Add New News 
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<colgroup>
								<col width="15%">
								<!-- <col width="20%"> -->
								<col width="25%">
								<col width="45%">
								<!-- <col width="15%"> -->
								<col width="15%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">No.</th>
									
									<th class="">Title</th>
									<th class="">Description</th>
									
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$news = $conn->query("SELECT * FROM news order by unix_timestamp(date_created) desc ");
								while($row=$news->fetch_assoc()):
									$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
									unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
									$desc = strtr(html_entity_decode($row['content']),$trans);
									$desc=str_replace(array("<li>","</li>"), array("",","), $desc);
									// $commits = $conn->query("SELECT * FROM news_commits where news_id =".$row['id'])->num_rows;
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<!-- <td class="">
										 <p> <b><?php echo date("M d, Y h:i A",strtotime($row['schedule'])) ?></b></p>
									</td> -->
									<td class="">
										 <p> <b><?php echo ucwords($row['title']) ?></b></p>
									</td>
									<td>
										 <p class="truncate"><?php echo strip_tags($desc) ?></p>
									</td>
									
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary view_news" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
										<button class="btn btn-sm btn-outline-warning edit_news" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_news" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_news').click(function(){
		uni_modal("New Entry","manage_news.php",'mid-large')
	})
	
	$('.edit_news').click(function(){
		uni_modal("Manage news","manage_news.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.view_news').click(function(){
		uni_modal("NEWS","view_news.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_news').click(function(){
		_conf("Are you sure to delete this post?","delete_news",[$(this).attr('data-id')],'mid-large')
	})

	function delete_news($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_news',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},250)

				}
			}
		})
	}
</script>
<!-- news section ended -->

<!-- notice section start  -->
<!-- <?php include('db_connect.php');?> -->

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Notice</b>
						<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right"  id="new_notice">
					<i class="fa fa-plus"></i> Add New Notice 
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<colgroup>
								<col width="15%">
								<!-- <col width="20%"> -->
								<col width="25%">
								<col width="45%">
								<!-- <col width="15%"> -->
								<col width="15%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">No.</th>
									
									<th class="">Title</th>
									<th class="">Description</th>
									
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$notice = $conn->query("SELECT * FROM notice order by unix_timestamp(date_created) desc ");
								while($row=$notice->fetch_assoc()):
									$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
									unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
									$desc = strtr(html_entity_decode($row['content']),$trans);
									$desc=str_replace(array("<li>","</li>"), array("",","), $desc);
									// $commits = $conn->query("SELECT * FROM notice_commits where notice_id =".$row['id'])->num_rows;
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<!-- <td class="">
										 <p> <b><?php echo date("M d, Y h:i A",strtotime($row['schedule'])) ?></b></p>
									</td> -->
									<td class="">
										 <p> <b><?php echo ucwords($row['title']) ?></b></p>
									</td>
									<td>
										 <p class="truncate"><?php echo strip_tags($desc) ?></p>
									</td>
									
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary view_notice" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
										<button class="btn btn-sm btn-outline-warning edit_notice" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_notice" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_notice').click(function(){
		uni_modal("New Entry","manage_notice.php",'mid-large')
	})
	
	$('.edit_notice').click(function(){
		uni_modal("Manage Notice","manage_notice.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.view_notice').click(function(){
		uni_modal("Notice","view_notice.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_notice').click(function(){
		_conf("Are you sure to delete this post?","delete_notice",[$(this).attr('data-id')],'mid-large')
	})

	function delete_notice($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_notice',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>