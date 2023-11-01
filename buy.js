$(document).ready(()=>{
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $("#date").val(today);

    var info_user_text = $('#info_user_text');
    var info_buyer = $('#info_buyer');

    var fio = $('#fio');
    var wf = $('#wf');
    var tw = $('#tw');
    var date = $('#date');
    var time = $('#time');
    var plan = $('#plan');

    var buy = $('#buy');

    wf.on("input", ()=>{
        // console.log(wf.val().length);
        
    });

    date.on("change", ()=>{
        get_time();
    });

    time.on("change", ()=>{
        get_plan();
    });

    function get_time(){
        $.ajax({
            url: 'coding/get_ways.php',
            method: 'POST',
            data: {i_wf: wf.val(), i_tw: tw.val(), i_date: date.val()},
            dataType: 'json',
            beforeSend: function(data){
                time.text("");
                time.append(`
                        <option>Загружается!</option>
                    `);
            },
            success: function(data) {
                time.text("");
                for(var i = 0; i < data.length; i++){
                    time.append(`
                        <option value="`+ i +`">`+ data[i].time_in +`</option>
                    `);
                }
            },
            error: function(xhr, status, error) {
                time.text("");
                time.append(`
                        <option>Произошла ошибка!</option>
                    `);
            }
        });
    }

    function get_plan(){
        $.ajax({
            url: 'coding/get_price.php',
            method: 'POST',
            data: {i_wf: wf.val(), i_tw: tw.val(), i_date: date.val()},
            dataType: 'json',
            beforeSend: function(data){
                plan.text("");
                plan.append(`
                        <option>Загружается!</option>
                    `);
            },
            success: function(data) {
                plan.text("");
                for(var i = 0; i < data.length; i++){
                    plan.append(`
                        <option value="`+ i +`">`+ data[i].name +`</option>
                    `);
                }
            },
            error: function(xhr, status, error) {
                plan.text("");
                plan.append(`
                        <option>Произошла ошибка!</option>
                    `);
            }
        });
    }

    buy.click(()=>{
        console.log(fio.val());
        console.log(wf.val());
        console.log(tw.val());
        console.log(date.val());
        console.log(time.val());
        console.log(plan.val());

        var number = 1 + Math.floor(Math.random() * 6);
        var t_num = "";
        while(t_num.length < 4){
            t_num += 1 + Math.floor(Math.random() * 9);
        }

        $.ajax({
            url: 'coding/get_ways.php',
            method: 'POST',
            data: {i_wf: wf.val(), i_tw: tw.val(), i_date: date.val()},
            dataType: 'json',
            beforeSend: function(data){
                info_user_text.text("Обработка");
            },
            success: function(data) {
                let t_b = time.val();
                info_user_text.text("Информация о билете");
                info_buyer.text("");
                info_buyer.append(`
                    <div style="display: flex; flex-direction: row;">
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Билет
                        <p class="fs-4" style="color: white;">`+ `№ 10302`+ t_num +`</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Поезд
                        <p class="fs-4" style="color: white;">`+ data[t_b].num_poezd +`</p>
                    </div>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        ФИО пассажира
                        <p class="fs-4" style="color: white;">`+ fio.val() +`</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Станция отправления
                        <p class="fs-4" style="color: white;">`+ wf.val() +`</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Станция назначения
                        <p class="fs-4" style="color: white;">`+ tw.val() +`</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Время отправления (мест.)
                        <p class="fs-4" style="color: white;">`+ date.val() + ` ` + $('#time option:selected').text() +`</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Название поезда
                        <p class="fs-4" style="color: white;">`+ data[t_b].inOut +`</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Тариф и стоимость проезда
                        <p class="fs-4" style="color: white;">`+ $('#plan option:selected').text() +`</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Дата и время продажи
                        <p class="fs-4" style="color: white;">`+ today +` 00:00</p>
                    </div>
                    `);
            },
            error: function(xhr, status, error) {
                info_user_text.text("Ошибка! Обратитесь в поддержку!");
            }
        });
        
    });

});