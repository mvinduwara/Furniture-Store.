<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parlo | Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="font-family: Arial, sans-serif;">
    <div style="background-color: #f8f9fa; padding: 20px; text-align: center;">
        <img src="resources/img/logo.png" alt="Company Logo" style="height: 20px;">
    </div>

    <div class="container">
        <div class="row row-sm">
            <div class="col-md-12 col-xl-12">
                <div class="main-content-body-invoice">
                    <!-- Rest of your content here -->
                    <div class="row row-sm">
                        <div class="col-md-12 col-xl-12">
                            <div class=" main-content-body-invoice">
                                <div class="card card-invoice">
                                    <div class="card-body">

                                        <div class="invoice-header">
                                            <h1 class="invoice-title" style="font-family: 'Courier New', Courier, monospace;font-weight: bold;">Invoice</h1>
                                            <div class="billed-from">
                                                <h6>BootstrapDash, Inc.</h6>
                                                <p>201 Something St., Something Town, YT 242, Country 6546<br>
                                                    Tel No: 324 445-4544<br>
                                                    Email: youremail@companyname.com</p>
                                            </div>
                                        </div>

                                        <div class="row mg-t-20">

                                            <div class="col-md">
                                                <label class="tx-gray-600 fw-600" style="font-family: 'Courier New', Courier, monospace;font-weight: bold;">Billed To</label>
                                                <div class="billed-to">
                                                    <h6>Juan Dela Cruz</h6>
                                                    <p>4033 Patterson Road, Staten Island, NY 10301<br>
                                                        Tel No: 324 445-4544<br>
                                                        Email: youremail@companyname.com</p>
                                                </div>
                                            </div>

                                            <div class="col-md" style="text-align: right;">
                                                <label class="tx-gray-600" style="font-family: 'Courier New', Courier, monospace;font-weight: bold;">Invoice Information</label>
                                                <p class="invoice-info-row"><span>Invoice No</span> <span>GHT-673-00</span></p>
                                                <p class="invoice-info-row"><span>Project ID</span> <span>32334300</span></p>
                                                <p class="invoice-info-row"><span>Issue Date:</span> <span>November 21, 2017</span></p>
                                                <p class="invoice-info-row"><span>Due Date:</span> <span>November 30, 2017</span></p>
                                            </div>

                                        </div>
                                        <div class="table-responsive mg-t-40">
                                            <table class="table table-invoice border text-md-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-20p">Type</th>
                                                        <th class="wd-40p">Description</th>
                                                        <th class="tx-center">QNTY</th>
                                                        <th class="tx-right">Unit Price</th>
                                                        <th class="tx-right">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Website Design</td>
                                                        <td class="tx-12">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                            accusantium doloremque laudantium, totam rem aperiam...</td>
                                                        <td class="tx-center">2</td>
                                                        <td class="tx-right">$150.00</td>
                                                        <td class="tx-right">$300.00</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="valign-middle" colspan="2" rowspan="4">
                                                            <div class="invoice-notes">
                                                                <label class="main-content-label tx-13">Notes</label>
                                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                                    accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                                                    illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                                    explicabo.</p>
                                                            </div><!-- invoice-notes -->
                                                        </td>
                                                        <td class="tx-right">Sub-Total</td>
                                                        <td class="tx-right" colspan="2">$5,750.00</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="tx-right">Tax (5%)</td>
                                                        <td class="tx-right" colspan="2">$287.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                                                        <td class="tx-right" colspan="2">
                                                            <h4 class="tx-primary tx-bold">$5,987.50</h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <a href="javascript:void(0);" class="btn btn-danger float-end mt-3 ms-2" onclick="javascript:window.print();">
                                            <i class="mdi mdi-printer me-1"></i>Print
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL-END -->
                    </div>
                </div>
            </div><!-- COL-END -->
        </div>
    </div>

    <div style="background-color: #f8f9fa; padding: 20px; text-align: center;">
        <p style="color: #6f42c1;">Contact us at: youremail@company.com | Phone: 123-456-7890</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>