html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-uppercase">Invoice</h1>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Billed:</span><span class="ml-1">Jasper Kendrick</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Date:</span><span class="ml-1">May 13, 2020</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Order ID:</span><span class="ml-1">#1345345</span></div>
                    </div>
                    <div class="col-md-6 text-right mt-3">
                        <h4 class="text-danger mb-0">Rae jones</h4><span>bbbootstrap.com</span>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Custom oil painting (24 X 36 in.)</td>
                                <td>10</td>
                                <td>34</td>
                                <td>340</td>
                            </tr>
                            <tr>
                                <td>Digital illustraion paint(8.5 X 11 in.)</td>
                                <td>12</td>
                                <td>50</td>
                                <td>600</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>940</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right mb-3"><button class="btn btn-danger btn-sm mr-5" type="button">Pay Now</button></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
