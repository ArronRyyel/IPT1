<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient - MediConnect Healthcare Portal</title>
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
        
        textarea {
            height: 100px;
            resize: vertical;
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
        .logout-btn {
            background: linear-gradient(to right, #e74c3c, #f39c12);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .user-menu {
            display: flex;
            align-items: center;
        }
        
        .user-info {
            margin-right: 20px;
            text-align: right;
        }
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .user-menu {
                margin-top: 15px;
                flex-direction: column;
            }
            
            .user-info {
                margin-right: 0;
                margin-bottom: 10px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            table {
                font-size: 14px;
            }
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
            <h2 class="page-title">Add Patient</h2>
            
            <form action="{{ route('patients.store') }}" method="POST" class="form-container">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="emergency_contact">Emergency Contact</label>
                        <input type="text" id="emergency_contact" name="emergency_contact">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group" style="flex: 100%;">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group" style="flex: 100%;">
                        <label for="medical_history">Medical History</label>
                        <textarea id="medical_history" name="medical_history"></textarea>
                    </div>
                </div>
                
                <div class="buttons">
                    <button type="submit" class="btn btn-primary">Add Patient</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>