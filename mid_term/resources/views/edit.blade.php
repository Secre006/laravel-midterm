<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="edit-page">
    <h1>Edit Customer</h1>


    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('updateCustomer', $customer->cust_id) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <input type="text" id="cust_name" name="cust_name" value="{{ old('cust_name', $customer->cust_name) }}" placeholder="Enter name">
        <input type="text" id="cust_address" name="cust_address" value="{{ old('cust_address', $customer->cust_address) }}" placeholder="Enter address">

        <button type="submit">Update</button>
        <a href="{{ url('/home') }}">Cancel</a>
    </form>
</body>
</html>
