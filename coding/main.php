<?
include $_SERVER['DOCUMENT_ROOT'] . '/parser/simple_html_dom.php';

function curlGetPage($url, $referer = 'http://google.com'){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.5845.931 YaBrowser/23.9.3.931 Yowser/2.5 Safari/537.36');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec($ch);
    return $response;
}

$page = curlGetPage('https://express-prigorod.ru/schedule-new/?dispatch=Сибирская&arrival=Речной%20вокзал&date=01.11.2023');
$html = str_get_html($page);


# ЦЕНА
function  getPrice($html){

    $prices = [];
    foreach($html->find('.abonement table[id=cost] tr') AS $element){
        $el_name = $element->find('td', 0);
        $el_price = $element->find('b', 0);

        if($el_price != NULL){     
            $prices[] = [
                'name' => $el_name->plaintext,
                'price' => $el_price->plaintext,
            ];
        }
        
    }
    echo json_encode($prices);
    // echo "<pre>";
    // var_dump($prices);
    // echo "</pre>";

}
# ЦЕНА

# РАСПИСАНИЕ
function  getWays($html){

    $posts = [];
    foreach($html->find('#schedule tbody tr') AS $element){
        $el = $element->find('td', 0);
        $el2 = $element->find('td', 1);
        $el3 = $element->find('td', 2);
        $el4 = $element->find('td', 3);
        $el5 = $element->find('td', 4);
        $posts[] = [
            'num_poezd' => trim($el->plaintext),
            'inOut' => trim($el2->plaintext),
            'time_in' => trim($el3->plaintext),
            'time_out' => trim($el4->plaintext),
            'days' => trim($el5->plaintext),
        ];

    }
    // echo "<pre>";

    echo json_encode($posts);
    // var_dump($posts);
    // echo "</pre>";

}
# РАСПИСАНИЕ
?>