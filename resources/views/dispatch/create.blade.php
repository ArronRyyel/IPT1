<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch Patient - MediConnect Healthcare Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #4a235a 0%, #8e44ad 100%);
            color: #333;
        }
        
        .container {
            max-width: 1100px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #4a235a 0%, #8e44ad 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            margin: 0;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }
        
        .header h1:before {
            content: "+";
            margin-right: 10px;
            font-size: 1.6rem;
        }
        
        .user-info {
            text-align: right;
            font-size: 0.8rem;
        }
        
        .sign-out {
            background-color: #f59331;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 0.8rem;
        }
        
        .content {
            padding: 20px;
        }
        
        .page-title {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: #333;
        }
        
        .form-container {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 25px;
            margin-bottom: 20px;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        
        .form-group {
            flex: 1;
            min-width: 250px;
            margin-right: 20px;
            margin-bottom: 15px;
        }
        
        .form-group:last-child {
            margin-right: 0;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 0.9rem;
        }
        
        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background-color: #522c7a;
            color: white;
        }
        
        .btn-secondary {
            background-color: #e4e4e4;
            color: #333;
        }
        .user-menu {
            display: flex;
            align-items: center;
        }
        
        .user-info {
            margin-right: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>MediConnect Dispatch Portal</h1>
            <div class="user-menu">
                <div class="user-info">
                <div>Welcome, {{ auth()->user()->name }}</div>
                <div style="font-size: 12px;">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
        
        <div class="content">
            <h2 class="page-title">Dispatch Patient</h2>
            
            <form action="{{ route('dispatch.patient.store') }}" method="POST" class="form-container">
                @csrf

                @if ($errors->any())
                    <div style="color: red; margin-bottom: 15px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-row">
                    <div class="form-group">
                        <label for="patient_id">Select Patient</label>
                        <select name="patient_id" id="patient_id" required>
                            <option value="">-- Select Patient --</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->first_name }} {{ $patient->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ambulance_id">Select Ambulance</label>
                        <select name="ambulance_id" id="ambulance_id" required>
                            <option value="">-- Select Ambulance --</option>
                            @foreach ($ambulances as $ambulance)
                                <option value="{{ $ambulance->id }}" {{ old('ambulance_id') == $ambulance->id ? 'selected' : '' }}>
                                    {{ $ambulance->license_plate }} ({{ $ambulance->model }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="location">Dispatch Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" required>
                    </div>
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-primary">Dispatch Patient</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>