<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

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
                    <button type="submit" class="btn btn-primary">Calculate</button>
                    <div id="result" class="mt-3 border rounded">

                    </div>
                </form>
            </div>
        </div>

    </div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>
