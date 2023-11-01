<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПОЛУЧИТЬ БИЛЕТ И ЦЕНУ НОВОСИБИРСК</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container" style="display: flex;">
        <div class="col d-flex" style="padding: 20px; justify-content: center; align-items: center; flex-direction: column; gap: 20px;">
            <div class="search">
                <input id="where_from" type="text" placeholder="ОТКУДА" value="Сибирская"/>
                <input id="to_where" type="text" placeholder="КУДА" value="Речной вокзал"/>
                <input id="date" type="date"/>
                <button id="search">НАЙТИ</button>
            </div>
            <div class="result fs-3 text-uppercase fw-bold" style="background-color: darkslategray; width: 100%; height: 100%; text-align: center; color:white; padding: 20px;">
                результат
            </div>
        </div>
        <div class="col d-flex" style="padding: 20px; justify-content: center; align-items: center; flex-direction: column; gap: 20px;">
            <div class="fs-3 text-uppercase fw-bold" style="background-color: darkslategray; width: 100%; height: 100%; text-align: center; color:white; padding: 20px;">
                <p class="text-price">Цена билетов:</p>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Персон</th>
                                <th scope="col">Цена</th>
                            </tr>
                        </thead>
                        <tbody class="price_c">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="index.js"></script>
</body>
</html>