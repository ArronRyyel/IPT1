<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch Patient</title>
</head>
<body>
    <div class="container">
        <h1>Dispatch Patient</h1>
        <form action="{{ route('dispatch.patient.store') }}" method="POST">
            @csrf
            <div>
                <label for="patient_id">Select Patient</label>
                <select name="patient_id" id="patient_id" required>
                    <option value="">-- Select Patient --</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ambulance_id">Select Ambulance</label>
                <select name="ambulance_id" id="ambulance_id" required>
                    <option value="">-- Select Ambulance --</option>
                    @foreach ($ambulances as $ambulance)
                        <option value="{{ $ambulance->id }}">{{ $ambulance->license_plate }} ({{ $ambulance->model }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="location">Dispatch Location</label>
                <input type="text" name="location" id="location" required>
            </div>
            <button type="submit">Dispatch</button>
        </form>
    </div>
</body>
</html>