<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КУПИТЬ БИЛЕТ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="display: flex; justify-content: center;">
    
    <div style="display: flex; flex-direction: row; gap: 20px;">
        <div style="background-color: #1B1B1B; padding: 20px; height: fit-content; color:white">
            <div style="display: flex; flex-direction: column;">
                <div class="mb-3">
                  <label for="" class="form-label">ФИО</label>
                  <input id="fio" type="text" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Станция отправления</label>
                    <input id="wf" type="text" class="form-control" value="Сибирская">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Станция назначения</label>
                    <input id="tw" type="text" class="form-control" value="Речной вокзал">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Дата</label>
                    <input id="date" type="date" class="form-control" placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Время</label>
                    <select id="time" class="form-select">
                        <option selected>Выбери время</option>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Тариф</label>
                    <select id="plan" class="form-select">
                        <option selected>Выбери тариф</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                  </div>
                  <button id="buy" class="btn btn-dark">КУПИТЬ</button>
            </div>
        </div>
        <div style="width: 700px; background-color: #1B1B1B; display: flex; flex-direction: column; height: 100vh; min-height: fit-content;">
            <div id="info_user_text" style="background-color: #E21A1A; padding: 20px; display: flex; align-items: center; color:white">
                Информация о билете
            </div>
            <div id="info_buyer" style="display: flex; flex-direction: column; color:white; padding: 20px;">
                <div style="display: flex; flex-direction: row;">
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Билет
                        <p class="fs-4" style="color: white;">№ 10384630</p>
                    </div>
                    <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                        Поезд
                        <p class="fs-4" style="color: white;">№ 6610</p>
                    </div>
                </div>
                <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                    ФИО пассажира
                    <p class="fs-4" style="color: white;">Серпов Евгений Морозов</p>
                </div>
                <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                    Станция отправления
                    <p class="fs-4" style="color: white;">Станция</p>
                </div>
                <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                    Станция назначения
                    <p class="fs-4" style="color: white;">Станция</p>
                </div>
                <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                    Время отправления (мест.)
                    <p class="fs-4" style="color: white;">01.11.2023 11:16</p>
                </div>
                <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                    Название поезда
                    <p class="fs-4" style="color: white;">Искитим - Новосибирск-Главный</p>
                </div>
                <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                    Тариф и стоимость проезда
                    <p class="fs-4" style="color: white;">Студенческий. 15,00 руб.</p>
                </div>
                <div class="fs-5 col" style="display: flex; flex-direction: column; color: #E95A41; ">
                    Дата и время продажи
                    <p class="fs-4" style="color: white;">01.11.2023 11:00</p>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="buy.js"></script>
</body>
</html>