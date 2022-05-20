<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="cashe-control" content="no-cashe"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo SITENAME;?></title>
        <!-- <link rel="stylesheet" href="./public/CSS/style.css"> -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            html, body {
    height: 100%;
    width: 100%;
    padding: 0;
    margin: 0;
    top: 0;
    bottom: 0;
    font-family: sans-serif;

}
.top_nav{
    display: block;
}
.top_nav ul{

    margin: 0;
    padding: 0;
    position: absolute;
    right: 6%;


}

.top_nav ul li{
    display: inline-flex;
    margin-left: 28px;
}
.top_nav ul li a{
    color: #ffffff;
    text-decoration: none;
    font-size: 18px;
}
.top_nav ul li a:hover{
    color: #afafaf;
    transition: 0.15s ease-in;
}
.section_landing{
    background: url('./img/alley-city.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100%;
    width: 100%;
}
.wrapper_landing{
    position: relative;
    text-align: center;
    margin: 0 auto;
    width: 100%;
    top: 40%;
}
.wrapper_landing h1{

    font-size: 48px;
    color: #fff;
    margin: 0;
    font-weight: 100;

}

.wrapper_landing h2{

    font-size: 42px;
    color: #afafaf;
    opacity: 0.6;
    margin: 0;
    font-weight: 100;

}

.btn_login{
    border: 1px solid #ffffff;
    padding: 6px 24px;
}
.navbar {
    width: 100%;
    height: 70px;
    background-color: #1a1a1a;
    box-shadow: 0px 0px 10px #1a1a1a;
}
.container_login {
    width: 100%;
    margin: 0 auto;
    position: relative;
    top: 90%;
}

.wrapper_login {
    width: 80%;
    margin: 0 auto;
    text-align: center;
}

.wrapper_login input {
    width: 200px;
    height: 26px;
    border: 1px solid #cccccc;
    background-color: #f5f5f5;
    font-size: 18px;
    display: block;
    position: relative;
    margin: 20px auto;
}

input::placeholder {
    color: #a1a1a1;
    font-size: 14px;
}

.wrapper_login h2 {
    font-size: 40px;
    text-transform: uppercase;
}
.submit {
    width: 200px;
    height: 42px;
    border: 1px solid #000000;
    background-color: #000000;
    color: #ffffff;
    font-size: 20px;
    margin: 20px 0px 0px 0px;
}

.submit:hover {
    border: 1px solid #a1a1a1;
    background-color: #a1a1a1;
    transition: 0.15s ease-in;
}

.options a {
    color: #006400;
}

.options a:hover {
    color: #000000;
    transition: 0.20s ease-in;
    text-decoration: none;
}

.invalidFeedBack {
    color: #ff0000;
    display: block;
}


        </style>
    </head>
    
    <body>