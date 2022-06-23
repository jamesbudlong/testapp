<!DOCTYPE html>
<html>

<head>
    <title>Display Data Using DOMPDF</title>
    <style>
        @page {
            margin-top: 30px;
            /* create space for header */
            margin-bottom: 30px;
            /* create space for footer */
        }
    </style>
</head>

<body>
    <div>
        @for ($i = 0; $i < count($data); $i++)
            <h1>{{ $data[$i]['name'] }}</h1>
            <ul>
                @for ($j = 0; $j < count($data[$i]['values']); $j++)
                    <li>
                        <h3>{{ $data[$i]['values'][$j]['name'] }}</h3>
                    </li>
                @endfor
            </ul>
        @endfor
    </div>
</body>

</html>
