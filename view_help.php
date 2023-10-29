<?php 
include 'admin/db_connect.php'; 
 $topic = $conn->query("SELECT *,u.name from help_topics f inner join users u on u.id = f.user_id  where f.id = ".$_GET['id']);
 foreach($topic->fetch_array() as $k=>$v){
 	if(!is_numeric($k))
 		$$k = $v;
 }
?>
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.gallery-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}
.gallery-img,.gallery-list .card-body {
    width: calc(50%)
}
.gallery-img img{
    border-radius: 5px;
    min-height: 50vh;
    max-width: calc(100%);
}
span.hightlight{
    background: yellow;
}
.carousel,.carousel-inner,.carousel-item{
   min-height: calc(100%)
}
header {
	background: url('https://images.app.goo.gl/7ammivgx5VYD3CD17');
	text-align: center;
	width: 100%;
	height: auto;
	background-size: cover;
	background-attachment: fixed;
	position: relative;
	overflow: hidden;
	border-radius: 0 0 85% 85% / 30%;
}
header .overlay{
	width: 100%;
	height: 100%;
	padding: 50px;
	color: #FFF;
	text-shadow: 1px 1px 1px #333;
    background: url('./assets/img/help1.png');
    background-size: 100%;
    filter: grayscale(50%);
	
}

h1 {
	font-family: 'Open Sans', sans-serif;
	font-size: 80px;
	margin-bottom: 30px;
    margin-top: 20px;
}

h3, p {
	font-family: 'Open Sans', sans-serif;
	margin-bottom: 30px;
}
.row2 {
    margin-top: 100px;
}
.box-item2 {
    
    background-image: linear-gradient(70deg, #ebeef0 0%, #ccd7de 100%);
    box-shadow: 0px 10px 30px 15px #0000002c;
    transition: 0.3s ease box-shadow;
}
 .box-item2:hover {
    box-shadow: 0px 0px 5px 0 #0000002c;
}

.box-item2::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-image: linear-gradient(60deg, #ebeef0 0%, #485563 100%);

    z-index: -1;
}
</style>

<header>
	<div class="overlay">
<h1> <?php echo $title ?> </h1>
<hr>
<h3>Posted by: <?php echo $name ?></h3>

		</div>
</header>



<div class="container mt-3 pt-2">
    <div class="card box-item2 text-black mb-4">
        <div class="card-body">
	            <?php echo html_entity_decode($description) ?>
        <hr class="hr hr-blurry">
        </div>
    </div>
  	<?php 
  	// echo "SELECT f.*,u.name,u.email FROM help_comments f inner join users u on u.id = f.user_id where f.topic_id = $id order by f.id asc";
  	$comments = $conn->query("SELECT h.*,u.name,u.username FROM help_comments h inner join users u on u.id = h.user_id where h.topic_id = $id order by h.id asc");
  	?>
    <div class="card text-black bg-light mb-4 box-item2">
    	<div class="card-body">
    		<div class="col-lg-12">
    			<div class="row">
    				<h3><b> <i class="fa fa-comments"></i> <?php echo $comments->num_rows ?> Comments</b></h3>
    			</div>
    			<hr class="hr hr-blurry" style="max-width: 100%">
    			<?php 
    			while($row= $comments->fetch_assoc()):
    			?>
    			<div class="form-group comment">
                    <?php if($_SESSION['login_id'] == $row['user_id']): ?>
                    <div class="dropdown float-right">
                      <a class="text-dark" href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-ellipsis-v"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item edit_comment" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Edit</a>
                        <a class="dropdown-item delete_comment" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Delete</a>
                      </div>
                    </div>
                    <?php endif; ?>
    				<p class="mb-0"><large><b><?php echo $row['name'] ?></b></large></p>
    				<small class="mb-0"><i><?php echo $row['username'] ?></i></small>
    				<br>
    				<?php echo html_entity_decode($row['comment']) ?>
    				<hr>
    			</div>
    		<?php endwhile; ?>
    		</div>
    			<hr class="hr hr-blurry" style="max-width: 100%">
    			<div class="col-lg-12">
    				<form action="" id="manage-comment">
    					<div class="form-group">
    						<input type="hidden" name="topic_id" value="<?php echo isset($id) ? $id : '' ?>">
    						<textarea class="form-control jqte" name="comment" cols="30" rows="5" placeholder="New Comment"></textarea>
    					</div>
    					<button class="btn btn-outline-info">Save Comment</button>
    				</form>
    			</div>
    	</div>
    </div>
    
</div>
    


<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
	$('.jqte').jqte();

    $('#new_help').click(function(){
        uni_modal("New Topic","manage_help.php",'mid-large')
    })
    $('.edit_comment').click(function(){
        uni_modal("Edit Comment","manage_comment.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.view_topic').click(function(){
        uni_modal("Career Opportunity","view_helps.php?id="+$(this).attr('data-id'),'mid-large')
    })

    $('#search').click(function(){
        var txt = $(this).val()
        start_load()
        $('.help-list').each(function(){
            var content = $(this).text()
            if((content.toLowerCase()).includes(txt.toLowerCase) == true){
                $(this).toggle('true')
            }else{
                $(this).toggle('false')
            }
        })
        end_load()
    })
    $('#manage-comment').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=save_comment',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
    $('.delete_comment').click(function(){
        _conf("Are you sure to delete this comment?","delete_comment",[$(this).attr('data-id')],'mid-large')
    })

    function delete_comment($id){
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=delete_comment',
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