<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Dispatches</title>
</head>
<body>
    <h1>All Dispatches</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Ambulance</th>
                <th>Location</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dispatches as $dispatch)
                <tr>
                    <td>#DIS-{{ $dispatch->id }}</td>
                    <td>{{ $dispatch->patient->first_name }} {{ $dispatch->patient->last_name }}</td>
                    <td>{{ $dispatch->ambulance->license_plate }}</td>
                    <td>{{ $dispatch->location }}</td>
                    <td>{{ $dispatch->created_at->format('M d, Y') }}</td>
                    <td>In Progress</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No dispatches found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>