<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ambulance - MediConnect Healthcare Portal</title>
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
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf <!-- This adds the CSRF token that Laravel requires for POST requests -->
                </form>
            </div>
        </div>
        
        <div class="content">
            <h2 class="page-title">Add Ambulance</h2>
            
            <form action="{{ route('ambulances.store') }}" method="POST" class="form-container">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="license_plate">License Plate</label>
                        <input type="text" id="license_plate" name="license_plate" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" id="model" name="model" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="Available">Available</option>
                            <option value="In-Use">In-Use</option>
                            <option value="Under Maintenance">Under Maintenance</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="assigned_to">Assigned To</label>
                        <input type="text" id="assigned_to" name="assigned_to">
                    </div>
                </div> 
                <div class="buttons">
                    <button type="submit" class="btn btn-primary">Add Ambulance</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>