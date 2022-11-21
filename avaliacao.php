<?php
$tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Avaliação</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 pt-5">
        <form>
            <div class="form-group row">
                <label for="inputNome3" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNome3" placeholder="Nome">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputServico3" class="col-sm-2 col-form-label">Serviço</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputServico3" placeholder="Serviço">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputServico3" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputServico3" placeholder="Serviço">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputServico3" class="col-sm-2 col-form-label">Data da conclusão</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputServico3">
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Nota</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-label" for="gridRadios1">
                                1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-label" for="gridRadios2">
                                2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                            <label class="form-label" for="gridRadios3">
                                3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-input" type="radio" name="gridRadios" id="gridRadios4" value="option4" disabled>
                            <label class="form-label" for="gridRadios4">
                                4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-input" type="radio" name="gridRadios" id="gridRadios5" value="option5" disabled>
                            <label class="form-label" for="gridRadios5">
                                5
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="inputComentario3" class="col-sm-2 col-form-label">Comentario</label>
                <div class="col-sm-10">
                    <textarea name="form-control" id="comentario" cols="100" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>