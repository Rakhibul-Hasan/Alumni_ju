 <style>
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
 </style>
<div class="container my-5">
    <div class="h-100">
    <div class="row row2">
        <div class="col-6">
    <img src="./assets/img/JU_IMG.jpg" class="img-fluid about-img" alt="">
        </div>
        <div class="col-6 text-red">
        <h1 class="section-title">About <span>JU</span></h1>
        
        <p class="text-dark"><?php echo $_SESSION['system']['about_content'] ?></p>
        </div>
    </div>
    </div>

</div>