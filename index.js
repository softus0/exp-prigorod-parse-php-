$(document).ready(()=>{

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $("#date").val(today);
    

    var _btn_search = $('#search');
    var _result = $('.result');

    var i_wf = $('#where_from');
    var i_tw = $('#to_where');
    var i_date = $('#date');

    _btn_search.on("click", ()=>{

        $(".price_c").text("");
        $.ajax({
            url: 'coding/get_ways.php',
            method: 'POST',
            data: {i_wf: i_wf.val(), i_tw: i_tw.val(), i_date: i_date.val()},
            dataType: 'json',
            beforeSend: function(data){
                _result.text("Обработка");
            },
            success: function(data) {
                _result.text("");
                _result.append(`<div class="wy"></div>`);
                for(var i = 0; i< data.length; i++){
                    $(".wy").append(`
                    <table class="table">
                    <tbody style="font-size: 16px">
                        <tr>
                        <th scope="col">`+ i +`</th>
                        <td scope="col">`+ data[i].num_poezd +`</td>
                        <td scope="col">`+ data[i].inOut +`</td>
                        <td scope="col">`+ data[i].time_in +`</td>
                        <td scope="col">`+ data[i].time_out +`</td>
                        <td scope="col">`+ data[i].days +`</td>
                        </tr>
                    </tbody>
                    </table>
                    `);
                }
            },
            error: function(xhr, status, error) {
                _result.text("Ошибка! Обратитесь в поддержку!");
            }
          });
        $.ajax({
            url: 'coding/get_price.php',
            method: 'POST',
            data: {i_wf: i_wf.val(), i_tw: i_tw.val(), i_date: i_date.val()},
            dataType: 'json',
            beforeSend: function(data){
                $(".text-price").text("Обработка");
            },
            success: function(data) {
                $(".text-price").text("Цена билетов:");
                for(var i = 0; i< data.length; i++){
                    if((data[i].name).toLowerCase() != "стоимость билетов"){
                        $(".price_c").append(`
                            <tr>
                            <td scope="col">`+ data[i].name +`</td>
                            <td scope="col">`+ data[i].price +`</td>
                            </tr>
                        `);
                    }
                }
            },
            error: function(xhr, status, error) {
                _result.text("Ошибка! Обратитесь в поддержку!");
            }
          });
    });
});