<?php require_once 'actions/db_connect.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
    <title>index page</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 
    <style type="text/css">
        body{
            background-image: url('img/giphy2.png');
            background-size: 1300px 700px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;


        }
        .manageUser {
            width: 95%;
            margin: auto;
        }
 


        /*NAVBAR*/
            /*structure*/
        nav{
         padding:  50px;
         text-align: center;
        }
        ul{
            list-style: none;
            padding: 0;
            margin: 0;
            display: inline-block;
            background: #ddd;
            border-radius: 5px;
        }
        li{
            float: left;
            width: 150px;
            height: 65px;
            line-height: 65px;
            position: relative;
            text-transform: uppercase;
            font-size: 14px;
            color: rgba(0, 0, 0, .7);
            cursor: pointer;
        }
        &:hover{
            background: #d5d5d5;
            border-radius: 5px;
        }
         ul.drop-menu{
            position: absolute;
            top: 100%;
            left: 0%;
            width: 100%;
            padding: 0;
         }
         li{
            background: #666;
            color: rgba(255, 255, 255, 0.7): ;
         }
         &:hover{
            background: #606060;
        }
        &:last-child{
            border-radius: 0px 0px 5px 5px;
        }

        /*Default trigger*/
        ul.drop-menu li{
           display: none; /*hide*/
        }
        li:hover > ul.drop-menu li{
            display: block; /*show*/
 
        }
        

        /*Menu 1*/
        li:hover > ul.drop-menu.menu-1 {
            perspective: 1000px;
        }
        li{
            opacity: 0.7;
        }
          @for $i from 1 through 6 
          $nth-child(#{$i})

            animation{
            animation-name:  menu1;
            animation-duration:  300ms*$i;
            animation-delay: (300ms*$i)-100;
            animation-timing-function: ease-in-out;
            animation-fill-mode: forwards;
            

        }

        @keyframes menu1{
            0%{
            opacity: 0;
            transform: rotateY(-90deg) translateY(30px);
        }
            100%{
            opacity: 1;
            transform: rotateY(0deg) translateY(0px);
        }}


        table {
            width: 100px;
            height: 100px;
            background: #3D425B;
            position: relative;
            -webkit-animation: mymove 0s infinite; /* Safari 4.0 - 8.0 */
            animation: mymove 0s infinite;
        }

        /* Safari 4.0 - 8.0 */
        @-webkit-keyframes mymove {
            0%   {left: 0px; top: 0px; background: red;}
            25%  {left: 0px; top: 100px; background: blue;}
            50%  {left: 100px; top: 100px; background: yellow;}
            75%  {left: 100px; top: 0px; background: green;}
            100% {left: 0px; top: 0px; background: red;}
        }

        /* Standard syntax */
        @keyframes mymove {
            0%   {left: 0px; top: 0px; background: red;}
            25%  {left: 0px; top: 100px; background: blue;}
            50%  {left: 100px; top: 100px; background: yellow;}
            75%  {left: 100px; top: 0px; background: green;}
            100% {left: 0px; top: 0px; background: red;}
        }

    </style>
</head>
<body>
    
<?php include 'navbar.php'; ?>
<a href="logout.php?logout">Sign Out</a>




    
 
<div class="manageUser">
    <a href="create.php"><button type="button">Add Event</button></a>

    <table border="1" cellspacing="0" cellpadding="0">
    
        <thead>
            <tr>
                <th>Event's name</th>
                <th>Event’s date and time</th>
                <th>Event’s description</th>
                <th>Event’s image</th>
                <th>Event’s capacity</th>
                <th>Event’s contact e-mail</th>
                <th>Event’s contact phone number</th>
                <th>Event’s address</th>
                <th>Event’s URL</th>
                <th>Event’s Type</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM events WHERE active = 0";
            $result = $connect->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                                <td>".$row['events_name']." </td>
                                <td> ".$row['events_date_and_time']."  </td>
                                <td>".$row['events_description']."</td>
                                <td>".$row['events_image']."  </td>
                                <td>".$row['events_capacity']."  </td>
                                <td>".$row['events_contact_e_mail']."  </td>
                                <td>".$row['events_contact_phone_number']."  </td>
                                <td>".$row['events_address']."  </td>
                                <td>".$row['events_url']."  </td>
                                <td>".$row['events_type']."  </td>
                                <td>
                                    <a href='update.php?id=".$row['id']."'><button type='button'>Edit</button></a>
                                    <a href='delete.php?id=".$row['id']."'><button type='button'>Delete</button></a>
                                </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='10'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
             
        </tbody>
    </table>
</div>





 
</body>
</html>