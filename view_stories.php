<?php include 'admin/db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM stories where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}

}
?>
<style type="text/css">
	.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 40vh !important;background: black;

	}
	#imagesCarousel{
		margin-left:unset !important ;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
		margin-top: unset;
		margin-bottom: unset;
	}
	#imagesCarousel img{
		width: calc(100%)!important;
		height: auto!important;
		/*max-height: calc(100%)!important;*/
		max-width: calc(100%)!important;
		cursor :pointer;
	}
	#banner{
		display: flex;
		justify-content: center;
	}
	#banner img{
		max-width: calc(100%);
		max-height: 50vh;
		cursor :pointer;
	}
	.row2{
        margin-top: 100px;
    }
    .about-img {
	height: 100%;
	width: 100%;
	position: relative;
	border: 10px solid #b3b3ff;
}
    .about-img::after {
	content: '';
	position: absolute;
	left: -33px;
	top: 19px;
	height: 98%;
	width: 98%;
	border: 7px solid crimson;
	z-index: -1;
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



<div class="container my-5">
    <div class="h-100">
    <div class="row row2">
        <div class="col-6">
		<!-- "./image/<?php echo $data['filename']; ?>" -->
    <img src="./admin/assets/uploads/<?php echo $banner ?>"; class="img-fluid about-img" alt="">
        </div>
        <div class="col-6 text-red">
        <div class="container">
	<div class="col-lg-12">
		<div class="card mt-4 mb-4">
			<div class="card-body box-item2">
				<div class="row">
					<div class="col-md-12">
						
					</div>
					<div class="col-md-12" id="content">
					<p class="">
                    <h3> <?php echo ucwords($title) ?> </h3>
						<p>Written by: <?php echo ucwords($writer) ?> </p>
						<?php echo html_entity_decode($content); ?>
					</p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
        </div>
    </div>
    </div>

</div>




<section></section>
<script>
	$('#imagesCarousel img,#banner img').click(function(){
		viewer_modal($(this).attr('src'))
	})
	$('#participate').click(function(){
        _conf("Are you sure to commit that you will participate to this stories?","participate",[<?php echo $id ?>],'mid-large')
    })

    function participate($id){
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=participate',
            method:'POST',
            data:{stories_id:$id},
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
