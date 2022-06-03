<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Emoji Calculator!</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Emoji Calculator!</h1>
                <form class="mt-3">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" name="firstOperand" id="firstOperand" aria-label="First operand" class="form-control" placeholder="First operand" required min="0">
                            <select name="operator" id="operator" class="custom-select" required>
                                <option selected value="">Choose Operator</option>
                                <option value="👽">👽 Addition (Alien)</option>
                                <option value="💀">💀 Subtraction (Skull)</option>
                                <option value="👻">👻 Multiplication (Ghost)</option>
                                <option value="😱">😱 Division (Scream)</option>
                            </select>
                            <input type="number" name="secondOperand" id="secondOperand" aria-label="Second operand" placeholder="Second operand" class="form-control" required min="0">
                        </div>
                    </div>
                    {{--<div class="form-group">
                        <label for="expression">Expression</label>
                        <input type="text" class="form-control" id="expression" aria-describedby="expressionHelp">
                        <small id="expressionHelp" class="form-text text-muted">
                            👽 Addition (Alien),
                            💀 Subtraction (Skull),
                            👻 Multiplication (Ghost),
                            😱 Division (Scream)
                        </small>
                    </div>--}}
                    <button type="button" role="button" id="calculate" class="btn btn-primary">Calculate</button>
                    <div id="result" class="mt-3 border rounded p-2">
                        <p><b>Operation : </b>N/A<br>
                            <b>Explanation : </b>N/A</p>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {

            $("#calculate").click(function () {
                var firstOperand = $("#firstOperand").val();
                var operator = $("#operator").val();
                var secondOperand = $("#secondOperand").val();
                console.log(operator);
                if(operator.length == 0){
                    $("#operator").focus();
                    alert('Please select Operator');
                }else{
                    var expression = firstOperand+operator+secondOperand;
                    $.ajax({
                        method: 'POST',
                        url: '{{route('emoji-calculator.calculate')}}',
                        data: {'expression': expression, '_token':'{{csrf_token()}}'},
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        },
                        cache: false,
                        dataType: 'json',
                        success: function (response) {
                            if (response.operation !== 'INVALID') {
                                let message = '<p><b>Operation : </b>' + response.operation +
                                    '</br><b>Explanation : </b>' + response.explanation +'</p>';
                                $('#result').html(message);
                            } else {
                                let message = '<p><b>Operation : </b>' + response.operation +
                                    '</br><b>Explanation : </b>' + response.explanation +'</p>';
                                $('#result').html(message);
                                alert(response.operation);
                            }
                        }
                    });
                }
            });

        });
    </script>
</body>
</html>
