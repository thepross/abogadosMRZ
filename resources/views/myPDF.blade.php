<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Abogados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="font-size: 8px">

    <h2>{{ strtoupper($table) }} - Reporte</h2>
    <p></p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                @foreach ($atributos as $key => $value)
                    <th>{{ $value }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach ($datos as $dato)
                <tr>
                    <td>{{ $dato->id }}</td>
                    @foreach ($atributos as $key => $value)
                        <td>{{ $dato->$value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/sb-admin-2.min.js') }}"></script> --}}

</body>

</html>
