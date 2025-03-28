<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ambulance</title>
</head>
<body>
    <h1>Add Ambulance</h1>
    <form action="{{ route('ambulances.store') }}" method="POST">
        @csrf
        <label for="license_plate">License Plate:</label>
        <input type="text" id="license_plate" name="license_plate" required><br><br>

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Available">Available</option>
            <option value="In-Use">In-Use</option>
            <option value="Under Maintenance">Under Maintenance</option>
        </select><br><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br><br>

        <label for="assigned_to">Assigned To:</label>
        <input type="text" id="assigned_to" name="assigned_to"><br><br>

        <button type="submit">Add Ambulance</button>
    </form>
</body>
</html>