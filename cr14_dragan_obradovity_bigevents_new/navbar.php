<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <style type="text/css" media="screen">
        
    
    /*NAVBAR start*/

        .outer{
            margin-top: 30px;

            margin-left: 300px;
            margin-bottom: 50px;
            


            width: 150px;
            height: 50px;
            overflow-x:hidden;
            position: relative;
            float: left;
            margin-right: 10px;
            border-radius:50px;
            }

        .inner{
            width: 300px;
            height: 50px;
            font:bold 16px/50px "arial";
            position: absolute; right: 0;
            color:white;
            text-align:  center; /*this shows LOGOUT and ADD EVENT, you can change with: text-align:right; as was previous*/
            text-decoration: none;
            white-space: pre;
            transition: width .7s, color .7s;}

        .inner:before{
            content:"";
            position: absolute;
            width: 139px;
            height: 39px;
            right: 5px;
            top: 5px;
            border-radius:50px;
            border:1px dashed #333;
        }
        .color1{background:linear-gradient(60deg, deepskyblue 150px,#333 180px, #333);}
        .color2{background:linear-gradient(60deg, papayawhip 150px,#333 180px, #333);}
        .color3{background:linear-gradient(60deg, orange 150px,#333 180px, #333);}
        .color4{background:linear-gradient(60deg, pink 150px,#333 180px, #333);}
        .color5{background:linear-gradient(60deg, red 150px,#333 180px, #333);}
        .color6{background:linear-gradient(60deg, green 150px,#333 180px, #333);}
            
        .inner:hover{
        width: 150px;
        color: black;}

        nav{
            float: left;
        }
/*NAVBAR ende*/
    </style>
</head>
<body>
    <nav>
    
        <div class="outer"> 
            <a href="create.php" class="inner color6"> ADD EVENT </a>
        </div>
        <div class="outer"> 
            <a href="logout.php?logout" class="inner color5"> LOGOUT </a>
        </div>
        

    </nav>
</body>
</html>