<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .card-header h4 {
            margin: 0;
        }
        .card-body {
            padding: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .text-md-end {
            text-align: right;
        }
        h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        p {
            margin: 5px 0;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h4>Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Company Details</h5>
                    <p><strong>Name:</strong> {{ $company->name }}</p>
                    <p><strong>Industry:</strong> {{ $company->industry }}</p>
                    <p><strong>Email:</strong> <a href="mailto:{{ $company->company_email }}">{{ $company->company_email }}</a></p>
                    <p><strong>Job Email:</strong> <a href="mailto:{{ $company->company_career_email }}">{{ $company->company_career_email }}</a></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Address</h5>
                    <p><strong>Country:</strong> {{ $company->country }}</p>
                    <p><strong>State:</strong> {{ $company->state }}</p>
                    <p><strong>Address:</strong> {{ $company->address }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h5>Additional Details</h5>
                    <p><strong>Career Page:</strong> <a href="{{ $company->career_page }}" target="_blank">Visit Career Page</a></p>
                    <p><strong>Phone:</strong> {{ $company->company_phone }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
