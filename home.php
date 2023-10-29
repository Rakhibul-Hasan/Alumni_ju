<?php
include 'admin/db_connect.php';
?>
<style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 35vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }

    .event-list {
        cursor: pointer;
    }

    span.hightlight {
        background: yellow;
    }

    .banner {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 26vh;
        width: calc(30%);
    }

    .banner img {
        width: calc(100%);
        height: calc(100%);
        cursor: pointer;
    }

    .event-list {
        cursor: pointer;
        border: unset;
        flex-direction: inherit;
    }

    .event-list .banner {
        width: calc(40%)
    }

    .event-list .card-body {
        width: calc(60%)
    }

    .event-list .banner img {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        min-height: 50vh;
    }

    span.hightlight {
        background: yellow;
    }

    .banner {
        min-height: calc(100%)
    }

    /* Hero Section */
    
	header.masthead2 {
		  background: url(mee/img/1.jpg);
		  background-repeat: no-repeat;
		  background-size: cover;
		}


    #hero {
        background: transparent;
    }

    #hero::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        /* background-color: transparent; */
        opacity: 0.7;
        z-index: -1;
    }

    #hero .hero {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 50px;
        justify-content: flex-start;
    }

    #hero h1 {
        display: block;
        width: fit-content;
        font-size: 4rem;
        position: relative;
        color: transparent;
        animation: text_reveal 0.5s ease forwards;
        animation-delay: 1s;
    }

    #hero h1:nth-child(1) {
        animation-delay: 1s;
    }

    #hero h1:nth-child(2) {
        animation-delay: 2s;
    }

    #hero h1:nth-child(3) {
        /*animation: text_reveal_name 0.5s ease forwards;*/
        animation-delay: 3s;
    }

    #hero h1 span {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 0;
        background-color: crimson;
        animation: text_reveal_box 1s ease;
        animation-delay: 0.5s;
    }

    #hero h1:nth-child(1) span {
        animation-delay: 0.5s;
    }

    #hero h1:nth-child(2) span {
        animation-delay: 1.5s;
    }

    #hero h1:nth-child(3) span {
        animation-delay: 2.5s;
    }

    @keyframes text_reveal_box {
        50% {
            width: 100%;
            left: 0;
        }

        100% {
            width: 0;
            left: 100%;
        }
    }

    @keyframes text_reveal {
        100% {
            color: white;
        }
    }

    @keyframes text_reveal_name {
        100% {
            color: crimson;
            font-weight: 500;
        }
    }

    /* End Hero Section */
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
<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <section id="hero">
                    <div class="hero container">
                        <div>
                            <h1>Welcome to <span></span></h1>
                            <h1> Alumni Management <span></span> </h1>
                            <h1>System <span></span></h1>
                        </div>
                    </div>
                </section>
                <!-- <hr class="divider my-4" /> -->

                <div class="col-md-12 mb-2 justify-content-center">
                </div>
            </div>

        </div>
    </div>
</header>

<!-- news start -->

<div class="container mt-4 pt-2">
    <h4 class="text-center text-dark">News</h4>
    <hr class="divider">
    <?php
    $event = $conn->query("SELECT * FROM news order by unix_timestamp(date_created) desc limit 3");
    while ($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['content']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
        ?>
        <div class="card event-list box-item2" data-id="<?php echo $row['id'] ?>">
            <div class='banner'>
                <?php if (!empty($row['banner'])): ?>
                    <img src="admin/assets/uploads/<?php echo ($row['banner']) ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row  align-items-center justify-content-center text-center h-100">
                    <div class="">
                        <h3><b class="filter-txt">
                                <?php echo ucwords($row['title']) ?>
                            </b></h3>
                        
                        <hr>
                        <larger class="truncate filter-txt">
                            <?php echo strip_tags($desc) ?>
                        </larger>
                        <br>
                        <hr class="divider" style="max-width: calc(80%)">
                        <button class="btn btn-primary float-right read_more_news" data-id="<?php echo $row['id'] ?>">Read
                            More</button>
                    </div>
                </div>


            </div>
        </div>
        <br>
    <?php endwhile; ?>

</div>

<!-- news end -->
<!-- notice start -->

<div class="container mt-4 pt-2">
    <h4 class="text-center text-dark">Notice</h4>
    <hr class="divider">
    <?php
    $event = $conn->query("SELECT * FROM notice order by unix_timestamp(date_created) desc limit 3");
    while ($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['content']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
        ?>
        <div class="card event-list box-item2" data-id="<?php echo $row['id'] ?>">
            <div class='banner'>
                <?php if (!empty($row['banner'])): ?>
                    <img src="admin/assets/uploads/<?php echo ($row['banner']) ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row  align-items-center justify-content-center text-center h-100">
                    <div class="">
                        <h3><b class="filter-txt">
                                <?php echo ucwords($row['title']) ?>
                            </b></h3>
                        
                        <hr>
                        <larger class="truncate filter-txt">
                            <?php echo strip_tags($desc) ?>
                        </larger>
                        <br>
                        <hr class="divider" style="max-width: calc(80%)">
                        <button class="btn btn-primary float-right read_more_notice" data-id="<?php echo $row['id'] ?>">Read
                            More</button>
                    </div>
                </div>


            </div>
        </div>
        <br>
    <?php endwhile; ?>

</div>

<!-- notice end -->
<!-- event start -->
<div class="container mt-4 pt-2">
    <h4 class="text-center text-dark">Upcoming Events</h4>
    <hr class="divider">
    <?php
    $event = $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '" . date('Y-m-d') . "' order by unix_timestamp(schedule) asc");
    while ($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['content']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
        ?>
        <div class="card event-list box-item2" data-id="<?php echo $row['id'] ?>">
            <div class='banner'>
                <?php if (!empty($row['banner'])): ?>
                    <img src="admin/assets/uploads/<?php echo ($row['banner']) ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row  align-items-center justify-content-center text-center h-100">
                    <div class="">
                        <h3><b class="filter-txt">
                                <?php echo ucwords($row['title']) ?>
                            </b></h3>
                        <div><small>
                                <p><b><i class="fa fa-calendar"></i>
                                        <?php echo date("F d, Y h:i A", strtotime($row['schedule'])) ?>
                                    </b></p>
                            </small></div>
                        <hr>
                        <larger class="truncate filter-txt">
                            <?php echo strip_tags($desc) ?>
                        </larger>
                        <br>
                        <hr class="divider" style="max-width: calc(80%)">
                        <button class="btn btn-primary float-right read_more" data-id="<?php echo $row['id'] ?>">Read
                            More</button>
                    </div>
                </div>


            </div>
        </div>
        <br>
    <?php endwhile; ?>

</div>
<!-- event end -->

<script>
    $('.read_more').click(function () {
        location.href = "index.php?page=view_event&id=" + $(this).attr('data-id')
    })
    $('.read_more_news').click(function () {
        uni_modal("NEWS", "view_news.php?id=" + $(this).attr('data-id'), 'mid-large')
    })
    $('.read_more_notice').click(function () {
        uni_modal("Notice", "view_notice.php?id=" + $(this).attr('data-id'), 'mid-large')
    })
    $('.banner img').click(function () {
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keyup(function (e) {
        var filter = $(this).val()

        $('.card.event-list .filter-txt').each(function () {
            var txto = $(this).html();
            txt = txto
            if ((txt.toLowerCase()).includes((filter.toLowerCase())) == true) {
                $(this).closest('.card').toggle(true)
            } else {
                $(this).closest('.card').toggle(false)

            }
        })
    })
</script>