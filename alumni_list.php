<?php
include 'admin/db_connect.php';
?>
<style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: 1;
        position: absolute;
        padding: 1em;
    }

    .alumni-list {
        cursor: pointer;
        border: unset;
        flex-direction: inherit;
    }

    .alumni-img {
        width: calc(30%);
        max-height: 30vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alumni-list .card-body {
        width: calc(70%);
    }

    .alumni-img img {
        border-radius: 100%;
        max-height: calc(100%);
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

    .alumni-text {
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

    .alumni-list p {
        margin: unset;
    }

    .row2 {
        margin-top: 100px;
    }
    .search-item2 {
        
        background-image: linear-gradient(70deg, #ebeef0 0%, #ccd7de 100%);
        box-shadow: 0px 10px 30px 15px #0000002c;
        transition: 0.3s ease box-shadow;
    }
     .search-item2:hover {
        box-shadow: 0px 0px 5px 0 #0000002c;
    }

    .search-item2::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-image: linear-gradient(60deg, #ebeef0 0%, #485563 100%);

        z-index: -1;
    }

    /* alumni Section */
    #alumni .alumni {
        flex-direction: column;
        text-align: center;
        /* max-width: 1500px; */
        margin: 0 auto;
        /* padding: 100px 0; */
    }

   

    #alumni .alist-bottom {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 5px;
    }

    #alumni .alist-item {
        height: 500px;
        /* width: 100%; */
        flex-basis: 80%;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        border-radius: 10px;
        padding: 1.5%;
        margin: 1.5%;
        background-size: cover;
        position: relative;
        z-index: 1;
        overflow: hidden;
        box-shadow: 0px 10px 30px 15px #0000002c;
        transition: 0.3s ease box-shadow;
    }

    #alumni .alist-item:hover {
        box-shadow: 0px 0px 5px 0 #0000002c;
    }

    #alumni .alist-item::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-image: linear-gradient(60deg, #ebeef0 0%, #485563 100%);

        z-index: -1;
    }

    #alumni .alist-bottom .pic {
        height: 50px;
        width: 50px;
        margin-bottom: 15px;

        align-items: right;
    }

    .pic .boby {
        border-radius: 50%;

    }

    #alumni .alist-item h2 {
        font-size: 2rem;
        color: bold black;
        margin-bottom: 10px;
        text-transform: uppercase;
        text-align: left;
    }

    #alumni .alist-item p {
        color: bold black;
        text-align: left;
    }

    /* End alumni Section */
</style>
<header>
    <div class="container-fluid h-100">
        <div class="row row2 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-black">Alumni Details</h3>
                <hr class="divider" style="max-width: calc(50%)" />

                <div class="col-md-12 mb-2 justify-content-center">
                </div>
            </div>

        </div>
    </div>
</header>
<div class="container">
    <div class="card search-item2 mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-md-10">
                    <div class="input-group mb-1">
                        
                        <input type="text" class="form-control" id="filter"
                            placeholder="Search using name,course or others" aria-label="Filter"
                            aria-describedby="filter-field">
                        <div class="input-group-prepend">
                        <button class="btn btn-info btn-block btn-sm" id="search"><i class="fa fa-search"></i></button>
                            <!-- <span class="input-group-text" id="filter-field"><i class="fa fa-search"></i></span> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <!-- <div class="col-md-4">
                    <button class="btn btn-dark btn-block btn-sm" id="search">Search</button>
                </div> -->
            </div>

        </div>
    </div>
</div>

<div class="container-fluid mt-3 pt-2">

    <div class="row-items">
        <div class="col-lg-12">
            <div class="row">
            <?php
                $fpath = 'admin/assets/uploads';
                $alumni = $conn->query("SELECT a.*,c.course,Concat(a.firstname,' ',a.middlename,' ',a.lastname) as name from alumnus_bio a inner join courses c on c.id = a.course_id where a.status = 1 order by Concat(a.firstname,' ',a.middlename,' ',a.lastname) asc");
                while ($row = $alumni->fetch_assoc()):
                    ?>
                    <div  id="alumni" class="col-md-4 item">
                        <div  class="card alumni alist-item" data-id="<?php echo $row['id'] ?>">
                            <div class="alumni-img">

                                <img class="card-img-top" src="<?php echo $fpath . '/' . $row['avatar'] ?>" alt="">
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center h-100">
                                    <div class="">
                                        <div>
                                            <p class="filter-txt"><b>
                                                    <?php echo $row['name'] ?>
                                                </b></p>
                                            <hr class="divider w-100" style="max-width: calc(100%)">
                                            <p class="filter-txt">Email: <b>
                                                    <?php echo $row['email'] ?>
                                                </b></p>
                                            <p class="filter-txt">Course: <b>
                                                    <?php echo $row['course'] ?>
                                                </b></p>
                                            <p class="filter-txt">Batch: <b>
                                                    <?php echo $row['batch'] ?>
                                                </b></p>
                                            <p class="filter-txt">Currently working in/as <b>
                                                    <?php echo $row['connected_to'] ?>
                                                </b></p>
                                            <br>
                                        </div>
                                    </div>
                                </div>


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

    $('.alumni-img img').click(function () {
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keypress(function (e) {
        if (e.which == 13)
            $('#search').trigger('click')
    })
    $('#search').click(function () {
        var txt = $('#filter').val()
        start_load()
        if (txt == '') {
            $('.item').show()
            end_load()
            return false;
        }
        $('.item').each(function () {
            var content = "";
            $(this).find(".filter-txt").each(function () {
                content += ' ' + $(this).text()
            })
            if ((content.toLowerCase()).includes(txt.toLowerCase()) == true) {
                $(this).toggle(true)
            } else {
                $(this).toggle(false)
            }
        })
        end_load()
    })

</script>