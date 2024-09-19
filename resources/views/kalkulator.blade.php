<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .calculator {
            margin-top: 100px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 300px;
            width: 100%;
        }
        .btn-custom {
            font-size: 1.5rem;
            padding: 10px;
            margin: 5px;
        }
        input[type="text"] {
            font-size: 2rem;
            text-align: right;
            margin-bottom: 10px;
            width: 100%;
        }
        .btn-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .btn-row button {
            flex: 1;
            margin: 2px;
        }
        .btn-row .btn-secondary {
            background-color: #f0f0f0;
        }
        .btn-row .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-row .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center">
    <div class="calculator">
        <h2 class="text-center mb-4">Kalkulator Sederhana</h2>
        <input type="text" id="display" class="form-control form-control-lg" placeholder="0" readonly>

        <div class="btn-row">
            <button type="button" class="btn btn-secondary" onclick="appendNumber('7')">7</button>
            <button type="button" class="btn btn-secondary" onclick="appendNumber('8')">8</button>
            <button type="button" class="btn btn-secondary" onclick="appendNumber('9')">9</button>
        </div>
        <div class="btn-row">
            <button type="button" class="btn btn-secondary" onclick="appendNumber('4')">4</button>
            <button type="button" class="btn btn-secondary" onclick="appendNumber('5')">5</button>
            <button type="button" class="btn btn-secondary" onclick="appendNumber('6')">6</button>
        </div>
        <div class="btn-row">
            <button type="button" class="btn btn-secondary" onclick="appendNumber('1')">1</button>
            <button type="button" class="btn btn-secondary" onclick="appendNumber('2')">2</button>
            <button type="button" class="btn btn-secondary" onclick="appendNumber('3')">3</button>
        </div>
        <div class="btn-row">
            <button type="button" class="btn btn-secondary" onclick="appendNumber('0')">0</button>
            <button type="button" class="btn btn-primary" onclick="setOperation('+')">+</button>
            <button type="button" class="btn btn-primary" onclick="setOperation('/')">/</button>
            <button type="button" class="btn btn-primary" onclick="setOperation('*')">*</button>
            <button type="button" class="btn btn-danger" onclick="clearDisplay()">C</button>
        </div>
        <button type="button" class="btn btn-primary btn-custom" onclick="calculate()">Hitung</button>
    </div>
</div>

<script>
    function appendNumber(number) {
        const display = document.getElementById('display');
        let currentValue = display.value;

        if (currentValue === '0') {
            display.value = number;
        } else {
            display.value += number;
        }
    }

    function clearDisplay() {
        document.getElementById('display').value = '0';
    }

    function setOperation(op) {
        const display = document.getElementById('display');
        const currentValue = display.value;

        if (currentValue !== '0') {
            display.value += ` ${op} `;
        }
    }

    function calculate() {
        const display = document.getElementById('display');
        const expression = display.value;
        try {
            const result = eval(expression);
            if (result === Infinity || isNaN(result)) {
                throw new Error('Invalid calculation');
            }
            display.value = result;
        } catch (e) {
            display.value = 'Error';
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
