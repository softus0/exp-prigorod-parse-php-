<?
include $_SERVER['DOCUMENT_ROOT'] . '/coding/main.php';

$i_wf = $_POST['i_wf'];
$i_tw = $_POST['i_tw'];
$i_date = $_POST['i_date'];

if(!empty($i_wf) && !empty($i_tw) && !empty($i_date)){
    $i_wf_edit = str_replace(" ", "%20", $i_wf);
    $i_tw_edit = str_replace(" ", "%20", $i_tw);

    $date_split = explode('-', $i_date);
    $new_date = $date_split[2].".".$date_split[1].".".$date_split[0];

    $page = curlGetPage('https://express-prigorod.ru/schedule-new/?dispatch='. $i_wf_edit .'&arrival='. $i_tw_edit .'&date='. $new_date);
    $html = str_get_html($page);

    getWays($html);
}else{
    echo "Не все поля заполнены!";
}
?>