<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Table to Excel Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="{{ URL::asset('js/table2excel.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/shim.min.js"
        integrity="sha512-nPnkC29R0sikt0ieZaAkk28Ib7Y1Dz7IqePgELH30NnSi1DzG4x+envJAOHz8ZSAveLXAHTR3ai2E9DZUsT8pQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
</head>

<body>
    <div class="container mt-3" style="overflow-x: auto;">
        {{-- <h3>Table to Excel Demo</h3>
        <p>Exporting the W3C Example Table</p> --}}

        <div>
            <input type="button" class="btn btn-primary font-weight-bold"
                onclick="tableToExcel('testTable', 'Example Table')" value="&nbsp; Export to Excel &nbsp;">
        </div>

        <br />

        <table id="testTable" summary="Code page support in different versions of MS Windows." rules="groups"
            frame="hsides" class="table" style="border-color: transparent;">

            <thead valign="top">
                <tr>
                    @foreach ($columns as $column)
                        <th style="background-color: #dedede;">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        @foreach ($row as $childrow)
                            <td>{{ $childrow }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,',
                template =
                '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><meta charset="UTF-8"><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
                base64 = function(s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                },
                format = function(s, c) {
                    return s.replace(/{(\w+)}/g, function(m, p) {
                        return c[p];
                    })
                }
            return function(table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {
                    worksheet: name || 'Worksheet',
                    table: table.innerHTML
                }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>
</body>

</html>
