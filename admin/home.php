<?php include 'db_connect.php' ?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
</head>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700");   
body{
    background: #dfe9f5;
}
.main--content{
    position: relative;
   
    width: 113%;
    padding: 1rem;
    margin-left: 30px;
    margin-top: 80px;

}
.header--wrapper{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    background: #fff;
    border-radius: 10px;
    padding: 10px 2rem;
    margin-bottom: 1rem;
}
.header--tittle{
    color: rgba(113, 99, 186, 255);
}


/* card container */
.card--container{
    background: #fff;
    padding: 2rem;
    border-radius: 10px;
}
.card--wrapper{
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}
.main--title{
    color: rgba(113, 99, 186, 255);
    padding-bottom: 10px;
    font-size: 15px;
}
.payment--card{
    background: rgb(299, 223, 223);
    border-radius: 10px;
    padding: 1.2rem;
    width: 250px;
    height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.5s ease;
}
.payment--card:hover{
    transform: translate(-5px);
}
.card--header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.card{
    display: flex;
    flex-direction: column;
    margin: 8px;
   
}
.icons i{
    font-size: 20px;
    padding: 10px;
    margin-left: 15px;
}

.title{
    font-size: 20px;
    /*font-family: "Courier New", Courier, monospace ;*/
    font-weight: 400;
    
}
.icon{
    color: #fff;
    padding: 1rem;
    height: 60px;
    width: 60px;
    text-align: center;
    border-radius: 50%;
    font-size: 1.5rem;
    background: red;
}





.light-red{
    background: rgb(254, 226, 254);
}
.light-purple{
    background: rgb(223, 204, 251);

}
.light-green{
    background: rgb(162, 237, 162);
}
.light-blue{
    background: rgb(236, 236, 254);
}
.light-nature{
    background: rgb(162, 197, 121);
}
.light-gray{
    background: rgb(238, 238, 238);
}
.light-yellow{
    background: rgb(233, 248, 149);
}
.light-skyblue{
    background: rgb(182, 242, 245);
}
.dark-red{
    background: rgb(223, 46, 56);
}
.dark-purple{
    background: purple;
}
.dark-green{
    background: green;
}
.dark-blue{
    background: blue;
}
.dark-teal{
    background: teal;
}
.dark-brown{
    background:  rgb(72, 33, 33);
}
.dark-navy{
    background: rgb(61, 48, 162);
}
.dark-maroon{
    background: rgb(149, 35, 35);
}

</style>
<div class="main--content">
        <div class="header--wrapper">
            <div class="header--tittle">
                <h1>Admin Dashboard</h1>
            </div>
          
        </div>

        <div class="card--container">
            <h3 class="main--title"><?php echo "Welcome Back ". $_SESSION['login_name']."!"  ?> </h3>
            <div class="card--wrapper">

              <div class="payment--card light-red">
                <div class="card--header">
                    <div class="card1">
                       <div class="icons"><i class="fa-solid fa-users"></i></div> 
                       <div><span class="title">
                        Alumni
                     </span>
                    </div>
                        
                    </div>
                    <i class=" icon dark-red"><?php echo $conn->query("SELECT * FROM alumnus_bio where status = 1")->num_rows; ?></i>
                 </div>
        </div>


        

        <div class="payment--card light-green">
            <div class="card--header">
                <div class="card2">
                   <div class="icons"><i class="fa-brands fa-hire-a-helper"></i></div> 
                   <div><span class="title">
                    Help Posts
                 </span>
                </div>
                    
                </div>
                <i class=" icon dark-green"><?php echo $conn->query("SELECT * FROM help_topics")->num_rows; ?></i>
             </div>
        </div>

        <div class="payment--card light-blue">
            <div class="card--header">
                <div class="card3">
                   <div class="icons"><i class="fa-solid fa-envelopes-bulk"></i></div> 
                   <div><span class="title">
                    Posted Jobs
                 </span>
                </div>
                    
                </div>
                <i class=" icon dark-blue"><?php echo $conn->query("SELECT * FROM careers")->num_rows; ?></i>
             </div>
        </div>

        <div class="payment--card light-purple">
            <div class="card--header">
                <div class="card4">
                   <div class="icons"><i class="fa-brands fa-envira"></i></i></div> 
                   <div><span class="title">
                   Gallery
                 </span>
                </div>
                    
                </div>
                <i class=" icon dark-purple"><?php echo $conn->query("SELECT * FROM gallery")->num_rows; ?></i>
             </div>
        </div>

        <div class="payment--card light-nature">
            <div class="card--header">
                <div class="card5">
                   <div class="icons"><i class="fa-sharp fa-solid fa-calendar-days"></i></div> 
                   <div><span class="title">
                    Upcoming Events
                 </span>
                </div>
                    
                </div>
                <i class=" icon dark-teal"><?php echo $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '".date('Y-m-d')."' ")->num_rows; ?></i>
             </div>
        </div>

        <div class="payment--card light-gray">
            <div class="card--header">
                <div class="card6">
                   <div class="icons"><i class="fa-regular fa-window-restore"></i></div> 
                   <div><span class="title">
                    Success Story
                 </span>
                </div>
                    
                </div>
                <i class=" icon dark-brown"><?php echo $conn->query("SELECT * FROM stories")->num_rows; ?></i>
             </div>
        </div>

        <div class="payment--card light-yellow">
            <div class="card--header">
                <div class="card7">
                   <div class="icons"><i class="fa-regular fa-newspaper"></i></div> 
                   <div><span class="title">
                    News
                 </span>
                </div>
                    
                </div>
                <i class=" icon dark-navy"><?php echo $conn->query("SELECT * FROM news")->num_rows; ?></i>
             </div>
        </div>
               

        <div class="payment--card light-skyblue">
            <div class="card--header">
                <div class="card8">
                   <div class="icons"><i class="fa-solid fa-users"></i></div> 
                   <div><span class="title">
                    Unvarified Request
                 </span>
                </div>
                    
                </div>
                <i class=" icon dark-maroon"><?php echo $conn->query("SELECT * FROM alumnus_bio where status = 0")->num_rows; ?></i>
             </div>
        </div>

    </div>

