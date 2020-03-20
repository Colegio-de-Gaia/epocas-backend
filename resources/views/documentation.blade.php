@extends(backpack_view('blank'))


@section('content')

    <div class="card">
        <div class="card-header">Documentação da API</div>
        <div class="card-body">
            <p>Aqui podes encontrar a documentação da Rest API desta aplicação.</p>

            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>Rota</th>
                    <th>Descrição</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>api/v1/epochs/</td>
                    <td>Apresenta todas as épocas</td>
                </tr>
                <tr>
                    <td>api/v1/epochs/:id</td>
                    <td>Apresenta a época com o id</td>
                </tr>
                <tr>
                    <td>api/v1/epochs/current</td>
                    <td>Apresenta a época corrente</td>
                </tr>

                <tr>
                    <td>api/v1/days/</td>
                    <td>Apresenta todos os dias</td>
                </tr>
                <tr>
                    <td>api/v1/days/:id</td>
                    <td>Apresenta o dia com o id</td>
                </tr>
                <tr>
                    <td>api/v1/days/epoch/:id</td>
                    <td>Apresenta os dias da época</td>
                </tr>

            </table>
        </div>
    </div>
@endsection
