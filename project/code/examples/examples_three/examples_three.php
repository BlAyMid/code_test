<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yousert</title>
    <link rel="stylesheet" href="/style/css/main/style-default.css" type="text/css">
    <link rel="stylesheet" href="/style/css/main/style1920x1080.css" media="screen and (max-width: 1920px) and (max-height: 1080px)" type="text/css"> <!--pc (1920x1080)!-->
    <link rel="stylesheet" href="/style/css/main/style1366x768.css" media="screen and (max-width: 1366px) and (max-height: 768px)" type="text/css"> <!--pc (1366х768)!-->
    <link rel="stylesheet" href="/style/css/main/style1280x1024.css" media="screen and (max-width: 1280px) and (max-height: 1024px)" type="text/css"> <!--!-->
    <link rel="stylesheet" href="/style/css/main/style1280x800.css" media="screen and (max-width: 1280px) and (max-height: 800px)" type="text/css"> <!--!-->
    <link rel="stylesheet" href="/style/css/main/style800x1280.css" media="screen and (max-width: 800px) and (max-height: 1280px)" type="text/css"> <!--!-->
    <link rel="stylesheet" href="/style/css/main/style1024x768.css" media="screen and (max-width: 1024px) and (max-height: 768px)" type="text/css"> <!--!-->
    <link rel="stylesheet" href="/style/css/main/style768x1024.css" media="screen and (max-width: 768px) and (max-height: 1024px)" type="text/css"> <!---->
    <link rel="stylesheet" href="/style/css/main/style640x480.css" media="screen and (max-width: 640px) and (max-height: 480px)" type="text/css"> <!--!-->
    <link rel="stylesheet" href="/style/css/main/style414x896.css" media="screen and (max-width: 414px) and (max-height: 896px)" type="text/css"> <!--!-->
    <link rel="stylesheet" href="/style/css/main/style360x800.css" media="screen and (max-width: 360px) and (max-height: 800px)" type="text/css"> <!--!-->
    <link rel="stylesheet" href="/style/css/main/style360x640.css" media="screen and (max-width: 360px) and (max-height: 640px)" type="text/css"> <!--!-->
</head>


<?php
include "header.php";


$get=$_GET['mod'];

if ($get=='sdelki')
{
    include "sdelki.php";
}

elseif ($get=='zaiavki')
{
    include  "zaiavki.php";
}

elseif ($get=='sdelki_etap')
{
    include  "sdelki_etap.php";
}
elseif ($get=='otdels')
{
    include  "otdels.php";
}
elseif ($get=='clients')
{
    include  "clients.php";
}
elseif ($get=='mcat')
{
    include  "mcat.php";
}

elseif ($get=='settings')
{
    include  "settings.php";
}

elseif ($get=='db')
{

    include ($_SERVER['DOCUMENT_ROOT'].'/admin/db.php');

}

elseif ($get=='editor')
{
    include  "editor.php";
}

elseif ($get=='voronki')
{
    include  "voronki.php";
}
elseif ($get=='product')
{
    include  "product.php";
}
elseif ($get=='staticpage')
{
    include  "staticpage.php";
}
elseif ($get=='filemanager')
{
    include "filemanager.php";
}
elseif ($get=='forumcat')
{
    include "forumcat.php";
}
elseif ($result && $result->num_rows>0)
{
    include "admin.php";
}
?>



<?PHP
$DATA['datetime']=date('Y-m-d H:i:s');

function snow_form(){
    global $start;
    global $mysqli;
    global $html;


    global $DATA;

    $DATA['rownews'] = mk_getrow("SELECT * FROM news WHERE id_news='".$_GET['id']."'");

    $DATA['imgname'] = date("Hi");
    $DATA['dirimgnews'] =  '/images/news/';


    $DATA['images'] = array();
    $text = explode(",", htmlspecialchars($DATA['rownews']['images']));
    for($i=0; $i<count($text); $i++)
    {
        $vol = "<".$text[$i].">";
        array_push($new_arr,$vol);
    }



    if (empty($DATA['rownews']['putdate']))
        $DATA['rownews']['putdate']=$DATA['datetime'];

    if ($_GET['id']>0)
    {
        $DATA['add']=$start['editt'];
        $DATA['listcat2'] = mk_gettable("SELECT category_name FROM cat_news WHERE news_id='".$_GET['id']."'");
    }
    else
    {
        $DATA['add']=$start['add'];
    }




    $DATA['listcat'] = mk_gettable("SELECT name,minname FROM news_cat");


}
function complete(){
    global $start;
    global $DATA;
    global $mysqli;



    if(empty($_POST['name'])) PRINT"����������� ���������";

    if($_POST['hide'] == "on") $showhide = "show";
    else $showhide = "hide";


    $name = $mysqli->real_escape_string($_POST['name']);
    $body = $mysqli->real_escape_string($_POST['body']);
    $id_news = $mysqli->real_escape_string($_POST['id_news']);
    $date_news = $mysqli->real_escape_string($_POST['date']);

    $mtitle= $mysqli->real_escape_string($_POST['mtitle']);
    $mdescription= $mysqli->real_escape_string($_POST['mdescription']);
    $mkeywords= $mysqli->real_escape_string($_POST['mkeywords']);
    $h1= $mysqli->real_escape_string($_POST['h1']);

    $image=$_POST['images6ex']['0'];

    if($_POST['url'] == "") $url = create_slug($_POST['name']);
    else $url = $mysqli->real_escape_string($_POST['url']);





    if($_POST['img2']>0) $img2 = "{$_POST['img2']},";
    if($_POST['img3']>0) $img3 = "{$_POST['img3']},";
    if($_POST['img4']>0) $img4 = "{$_POST['img4']},";
    if($_POST['img5']>0) $img5 = "{$_POST['img5']}";

    $images="$img2$img3$img4$img5";


    $result = $mysqli->query("SELECT * FROM news WHERE id_news = '".$_POST['id_news']."'");

    $row = mysqli_fetch_array($result);
    if(empty($row['id_news']))
    {

        $mysqli->query("INSERT INTO news (name,url,image,images,body,putdate,hide,mtitle,mdescription,mkeywords,h1) VALUES ('$name','$url','$image','$images','$body','$date_news','$showhide','$mtitle','$mdescription','$mkeywords','$h1')");
        $insert_id = mysql_insert_id();




    }
    else
    {

        $mysqli->query("UPDATE news SET name = '$name',url = '$url', image = '$image', images = '$images', 
                                     body = '$body',mtitle = '$mtitle',mdescription = '$mdescription',mkeywords = '$mkeywords',h1 = '$h1',
									 hide = '$showhide'
                                     WHERE id_news = '$id_news';");

        $mysqli->query("DELETE FROM cat_news WHERE news_id = '$id_news';");




        $DATA['erorr'] ='<div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">'.$start['goback'].'?</button>
        '.$start['dataupdated'].'!
    </div>';







    }
}
function show_news() {
    global $start;
    global $mysqli;
    global $html;

    global $DATA;


    $DATA['lang']=$start;
    //
    $num = 10;
//
    $page = $_GET['page'];
//
    $result = $mysqli->query("SELECT COUNT(*) FROM news");

    $posts = $result;
//
    $total = intval(($posts - 1) / $num) + 1;
//
    $page = intval($page);
//
//
//
    if(empty($page) or $page < 0) $page = 1;
    if($page > $total) $page = $total;
//
    $start = $page * $num - $num;


    //
    if ($page != 1) $pervpage = '<a href=?mod=news&page='. ($page - 1) .'>Prev</a>';
    else
        $pervpage = '<a href=?mod=news&page=1>Prev</a>';
//
    if ($page != $total) $nextpage = '<a href=?mod=news&page='. ($page + 1) .'>Next</a>';
    elseif ($page = $total) $nextpage = '<a href="#">Next</a>';
    else
        $nextpage = '<a href=?mod=news&page='. ($page + 1) .'>Next</a>';

//
    if($page - 2 > 0) $page2left = ' <a href=?mod=news&page='. ($page - 2) .'>'. ($page - 2) .'</a>';
    if($page - 1 > 0) $page1left = '<a href=?mod=news&page='. ($page - 1) .'>'. ($page - 1) .'</a>';
    if($page + 2 <= $total) $page2right = ' <a href=?mod=news&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
    if($page + 1 <= $total) $page1right = ' <a href=?mod=news&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

    $curpage = '<a href=?mod=news&page='.$page.'>'.$page.'</a>';



    $DATA['pagination']='<ul>
        <li>'.$pervpage.'</li>
        <li>'.$page2left.'</li>
        <li>'.$page1left.'</li>
        <li>'.$curpage.'</li>
		 <li>'.$page1right.'</li>
        <li>'.$page2right.'</li>
        <li>'.$nextpage.'</li>
    </ul>';



    $DATA['newslist']=mk_gettable("SELECT * FROM news ORDER BY id_news DESC LIMIT $start, $num;");


}
function delete_news(){
    global $start;
    global $mysqli;

    $mysqli->query("DELETE FROM news WHERE id_news = '".$_GET['del']."';");
    $mysqli->query("DELETE FROM cat_news WHERE news_id = '".$_GET['del']."';");
    echo '<h3>'.$start['dataremoved'].'</h3>';
    goback();
}


if($_GET['del']) delete_news();
if($_POST['edit']) complete(); //
if($_GET['id']) snow_form(); //
else show_news(); //


$tpl = "templates/default/news.tpl"; //
$html = websun_parse_template_path($DATA, $tpl); //
echo $html; //
?>
