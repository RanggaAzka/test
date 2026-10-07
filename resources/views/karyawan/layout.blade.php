<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Karyawan')</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 40px 20px;
            color: #1f2937;
        }

        .container {
            max-width: 760px;
            margin: 0 auto;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 4px;
        }

        p.subtitle {
            margin-top: 0;
            color: #6b7280;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #1f2937;
            color: #ffffff;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tr.highlight td {
            background: #fef9c3;
            font-weight: 600;
        }

        td.gaji {
            text-align: right;
            font-variant-numeric: tabular-nums;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .table-wrap {
            overflow-x: auto;
        }

        .legend {
            margin-top: 16px;
            font-size: 13px;
            color: #6b7280;
        }

        .legend span {
            display: inline-block;
            width: 14px;
            height: 14px;
            background: #fef9c3;
            border: 1px solid #e5e7eb;
            vertical-align: -2px;
            margin-right: 6px;
        }

        .alert {
            margin-bottom: 20px;
            padding: 12px 16px;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            font-size: 14px;
        }

        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .btn,
        .btn-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 16px;
            font-size: 14px;
            font-family: inherit;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #1f2937;
            border: 1px solid #1f2937;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #111827;
        }

        .btn-secondary {
            background: #ffffff;
            border: 1px solid #d1d5db;
            color: #1f2937;
        }

        .btn-secondary:hover {
            background: #f3f4f6;
        }

        .btn-danger {
            background: #ffffff;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .btn-danger:hover {
            background: #fef2f2;
        }

        td .btn-danger,
        td .btn-secondary {
            min-height: 38px;
            padding: 8px 12px;
            font-size: 13px;
        }

        td form {
            display: inline;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            box-sizing: border-box;
            min-height: 44px;
            padding: 10px 12px;
            font-size: 14px;
            font-family: inherit;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            background: #ffffff;
            color: #1f2937;
        }

        .form-group input:focus {
            outline: 2px solid #2563eb;
            outline-offset: 1px;
            border-color: #2563eb;
        }

        .form-group .error {
            display: block;
            margin-top: 6px;
            font-size: 13px;
            color: #b91c1c;
        }

        .panel {
            background: #ffffff;
            padding: 24px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .form-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>