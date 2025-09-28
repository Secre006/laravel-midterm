<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="home-page">
    <h1>Customer List</h1>


    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif


    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customerData as $customer)
                <tr>
                    <td>{{ $customer->cust_id }}</td>
                    <td>{{ $customer->cust_name }}</td>
                    <td>{{ $customer->cust_address }}</td>
                    <td>
                        <a href="{{ route('editCustomer', $customer->cust_id) }}">
                            <button type="button" class="btn btn-edit">Edit</button>
                        </a>
                        <form action="{{ route('deleteCustomer', $customer->cust_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this customer?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-data">No customers found</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <h2>Add Customer</h2>
    <form action="{{ route('saveCustomer') }}" method="POST" class="add-form">
        @csrf
        <input type="text" id="cust_name" name="cust_name" placeholder="Enter name" value="{{ old('cust_name') }}">
        <input type="text" id="cust_address" name="cust_address" placeholder="Enter address" value="{{ old('cust_address') }}">
        <button type="submit" class="btn">Add Customer</button>
    </form>
</body>
</html>
