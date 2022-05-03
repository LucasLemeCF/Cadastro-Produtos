<html>

<head>
    <title>Adicionar</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>

<body>
    <div class="card border-success m-3">
        <h5 class="card-header text-success">Adicionar</h5>
        <div class="card-body">
            <form>
                <div class="row mb-3 mt-3">
                    <div class="col">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">Código</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Unidade de Medida</label>
                        <select class="form-select" aria-label="familia">
                            <option selected>Selecione a Unidade de Medida</option>
                            <option value="UN">UN - Unidade</option>
                            <option value="PC">PC - Peça</option>
                            <option value="KG">KG - Kilograma</option>
                            <option value="G">G - Grama</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Família</label>
                        <select class="form-select" aria-label="familia">
                            <option selected>Selecione a família</option>
                            <option value="MTE">MTE - Material de Escritório</option>
                            <option value="MTP">MTP - Materia Prima</option>
                            <option value="PA">PA - Produto Acabado</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Situação</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Data de Implementação</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">Data de liberação</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Descrição</label>
                        <textarea type="text" class="form-control overflow-auto"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Código da Empresa</label>
                        <input type="text" class="form-control ">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Descrição da Empresa</label>
                        <textarea type="text" class="form-control overflow-auto"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Adicionar</button>
                <button type="submit" class="btn btn-outline-success">Voltar</button>
            </form>
        </div>
    </div>
</body>

</html>