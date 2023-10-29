<?php
include 'admin/db_connect.php';
?>
<style>
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

    .row-items {
        position: relative;
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
<header class="row2">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">Success Stories</h3>
                <hr class="divider my-4" />
                <div class="row col-md-12 mb-2 justify-content-center">
                    <button class="btn btn-primary btn-block col-sm-3" type="button" id="new_stories"><i
                            class="fa fa-plus"></i> Post Your Story</button>
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
                            placeholder="Search stories" aria-label="Filter"
                            aria-describedby="filter-field">
                        <div class="input-group-prepend">
                            <button class="btn btn-info btn-block btn-sm" id="search"><i
                                    class="fa fa-search"></i></button>
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

<div class="container pt-2">
<?php
    $stories = $conn->query("SELECT * FROM stories order by id desc");
    while ($row = $stories->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['content']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
        ?>
        <div class="card event-list box-item2" data-id="<?php echo $row['id'] ?>">
            <div class='banner gallery-img'>
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
                                <p><b> Written by: <?php echo ucwords($row['writer']) ?>
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

</div>


<script>
   
    $('#new_stories').click(function () {
        uni_modal("New Topic", "manage_stories.php", 'mid-large')
    })
    $('.read_more').click(function () {
        location.replace('index.php?page=view_stories&id=' + $(this).attr('data-id'))
    })
    $('.edit_stories').click(function () {
        uni_modal("Edit Topic", "manage_stories.php?id=" + $(this).attr('data-id'), 'mid-large')
    })
    $('.gallery-img img').click(function () {
        viewer_modal($(this).attr('src'))
    })
    $('.delete_stories').click(function () {
        _conf("Are you sure to delete this Topic?", "delete_stories", [$(this).attr('data-id')], 'mid-large')
    })

    function delete_stories($id) {
        start_load()
        $.ajax({
            url: 'admin/ajax.php?action=delete_stories',
            method: 'POST',
            data: { id: $id },
            success: function (resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success')
                    setTimeout(function () {
                        location.reload()
                    }, 1500)

                }
            }
        })
    }
    $('#filter').keypress(function (e) {
        if (e.which == 13)
            $('#search').trigger('click')
    })
    $('#search').click(function () {
        var txt = $('#filter').val()
        start_load()
        if (txt == '') {
            $('.event-list').show()
            end_load()
            return false;
        }
        $('.event-list').each(function () {
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