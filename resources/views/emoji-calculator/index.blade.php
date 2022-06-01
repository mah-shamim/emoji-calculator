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
                <form>
                    <div class="form-group">
                        <label for="expression">Expression</label>
                        <input type="text" class="form-control" id="expression" aria-describedby="expressionHelp">
                        <small id="expressionHelp" class="form-text text-muted">
                            👽 Addition (Alien),
                            💀 Subtraction (Skull),
                            👻 Multiplication (Ghost),
                            😱 Division (Scream)
                        </small>
                    </div>
                    <button type="button" role="button" id="calculate" class="btn btn-primary">Calculate</button>
                    <div id="result" class="mt-3 border rounded">

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
                var expression = $("#expression").val();
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
                        console.log(response);
                        /*if (response.status === true) {
                            notify('Already Registered Applicant', 'warning', 'Notification');
                            const applicant = response.data.pop();

                            //load all except checkbox
                            for (const field in applicant) {
                                const fieldId = "#" + field;
                                if ($("body").find(fieldId)) {
                                    const inputField = $(fieldId);
                                    if (applicant.hasOwnProperty(field)) {
                                        inputField.val(applicant[field]);
                                        inputField.trigger('change');
                                    }
                                }
                            }

                            //checkbox
                            applicant.survey_id.forEach(function (element) {
                                $("#survey_id-checkbox-" + element).prop("checked", true);
                            });
                            //radio
                            $("#is_employee-radio-" + applicant.is_employee).prop("checked", true);
                            $("#gender_id-radio-" + applicant.gender_id).prop("checked", true);

                            if (applicant.is_employee === 'yes') {
                                $("#work_space").show();
                            } else {
                                $("#work_space").hide();
                            }

                        } else {
                            $("#id").val('');
                        }*/
                    }
                });
            });

        });
    </script>
</body>
</html>
