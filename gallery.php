<?php
include 'admin/db_connect.php';
?>

<style>


header {
	background: url('http://www.autodatz.com/wp-content/uploads/2017/05/Old-Car-Wallpapers-Hd-36-with-Old-Car-Wallpapers-Hd.jpg');
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
  background-image: linear-gradient( 135deg, #9f05ff69 10%, #fd5e086b 100%);
	
}

h1 {
	font-family: 'Dancing Script', cursive;
	font-size: 80px;
	margin-bottom: 15px;
    margin-top: 20px;
}





    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }

    .gallery-list {
        cursor: pointer;
        border: unset;
        flex-direction: inherit;
    }

    .gallery-img,
    .gallery-list .card-body {
        width: calc(50%)
    }

    .gallery-img img {
        border-radius: 5px;
        min-height: 50vh;
        max-width: calc(100%);
    }

    span.hightlight {
        background: yellow;
    }

    .carousel,
    .carousel-inner,
    .carousel-item {
        min-height: calc(100%)
    }

    header.masthead,
    header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }

    .row-items {
        position: relative;
    }

    .card-left {
        left: 0;
    }

    .card-right {
        right: 0;
    }

    .rtl {
        direction: rtl;
    }

    .gallery-text {
        justify-content: center;
        align-items: center;
    }

    .masthead {
        min-height: 23vh !important;
        height: 23vh !important;
    }

    .masthead:before {
        min-height: 23vh !important;
        height: 23vh !important;
    }

    /*-------------------------------Gallery-------------------------*/

    #gallery .gallery {
        flex-direction: column;
        text-align: center;
        /* max-width: 2000px; */
        margin: auto;
        padding: 50px 5px;
    }

    #gallery .gal-top {
        max-width: 500px;
        margin: 0 auto;
    }

    #gallery .gal-bottom {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 50px;
    }

    #gallery .picture {
        flex-basis: 30%;

        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        border-radius: 10px;
        padding: 10px;
        margin: 10px;
        background-size: cover;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    #gallery .picture:hover {
        box-shadow: 0px 0px 30px 10px #0000002c;
        transition: 0.3s ease box-shadow;
    }

    #gallery .picture::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-image: linear-gradient(60deg, #ebeef0 0%, #485563 100%);

        z-index: -1;
    }


    .gallery img {
        width: 100%;
        height: auto;
    }

    .desc {
        padding: 15px;
        text-align: center;
        font-size: medium;
    }

    .picture {
        margin: 5px;
        border: 1px solid #ccc;
        float: left;
        width: 300px;
    }

    /*-------------------------------END  Gallery------------------------*/
</style>



<header>
	<div class="overlay">
<h1>Photo Album</h1>
		</div>
</header>

<div class="container-fluid mt-3 pt-2">

    <div class="row-items">
        <div class="col-lg-12">
            <div class="row">
                <?php
                $rtl = 'rtl';
                $ci = 0;
                $img = array();
                $fpath = 'admin/assets/uploads/gallery';
                $files = is_dir($fpath) ? scandir($fpath) : array();
                foreach ($files as $val) {
                    if (!in_array($val, array('.', '..'))) {
                        $n = explode('_', $val);
                        $img[$n[0]] = $val;
                    }
                }
                $gallery = $conn->query("SELECT * from gallery order by id desc");
                while ($row = $gallery->fetch_assoc()):

                    $ci++;
                    if ($ci < 3) {
                        $rtl = '';
                    } else {
                        $rtl = 'rtl';
                    }
                    if ($ci == 4) {
                        $ci = 0;
                    }
                    ?>
                   
                    <div id="gallery" class="gal-bottom col-sm-3">
                        <div class="picture">
                            
                                <img src="<?php echo isset($img[$row['id']]) && is_file($fpath . '/' . $img[$row['id']]) ? $fpath . '/' . $img[$row['id']] : '' ?>"
                                    class="img-fluid">
                            
                            <div class="desc">
                                <?php echo ucwords($row['about']) ?>
                            </div>
                        </div>
                        
                        <br>
                    </div>
                   
                    
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>


<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
    $('.book-gallery').click(function () {
        uni_modal("Submit Booking Request", "booking.php?gallery_id=" + $(this).attr('data-id'))
    })
    $('.picture img').click(function () {
        viewer_modal($(this).attr('src'))
    })

</script>