<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediConnect Dispatches Dashboard</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #4a235a 0%, #8e44ad 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            min-height: 230vh;
            padding: 20px 0;
        }
        
        .dashboard-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1200px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            background: linear-gradient(135deg, #4a235a 0%, #8e44ad 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
        }
        
        .logo span {
            margin-left: 10px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
        }
        
        .user-info {
            margin-right: 20px;
            text-align: right;
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
        
        .content {
            padding: 20px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .stat-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
        
        .stat-card h3 {
            margin-top: 0;
            color: #4a235a;
            font-size: 18px;
        }
        
        .stat-value {
            font-size: 36px;
            font-weight: bold;
            margin: 10px 0;
            color: #8e44ad;
        }
        
        .recent-activity {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .activity-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .activity-title h3 {
            margin: 0;
            color: #4a235a;
        }
        
        .view-all {
            color: #8e44ad;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        
        .view-all:hover {
            color: #4a235a;
            text-decoration: underline;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #4a235a;
        }
        
        table tr:hover {
            background-color: #f5f5f5;
        }
        
        .status {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }
        
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-complete {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .footer {
            padding: 15px 20px;
            background-color: #f8f9fa;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
            text-align: center;
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
    <div class="dashboard-container">
        <div class="header">
            <div class="logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4V20M4 12H20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>MediConnect Dispatch Portal</span>
            </div>
            <div class="user-menu">
                <div class="user-info">
                <div>Welcome, {{ auth()->user()->name }}</div>
                <div style="font-size: 12px;">{{ auth()->user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf <!-- This adds the CSRF token that Laravel requires for POST requests -->
                    <button type="submit" class="logout-btn">Sign Out</button>
                </form>
            </div>
        </div>
            <div class="content">
                <h2>Dashboard</h2>
                <p>Access your dispatch dashboard and continue where you left off.</p>
                
                
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>Ambulances</h3>
                        <div class="stat-value">{{ $ambulanceCount }}</div> <!-- Dynamic count -->
                        <p>{{ $ambulances->where('status', 'Available')->count() }} Available, {{ $ambulances->where('status', 'In-Use')->count() }} In Use, {{ $ambulances->where('status', 'Under Maintenance')->count() }} Under Maintenance</p>
                    </div>
                    <div class="stat-card">
                        <h3>Dispatches</h3>
                        <div class="stat-value">25</div>
                        <p>12 Completed, 8 In Progress, 5 Pending</p>
                    </div>
                    <div class="stat-card">
                        <h3>Patients</h3>
                        <div class="stat-value">{{ $patientsCount }}</div> <!-- Dynamic count -->
                        <p>28 Admitted, 22 Discharged</p>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 20px; margin-left: 20px;">
                <a href="{{ route('add.patient') }}" class="btn btn-primary" style="margin-right: 10px; background: #4a235a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Add Patient</a>
                <a href="{{ route('add.ambulance') }}" class="btn btn-primary" style="background: #4a235a; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Add Ambulance</a>
            </div>
            @if (session('success'))
                <div style="color: green; margin-bottom: 20px; margin-left: 20px;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="recent-activity">
                <div class="activity-title">
                    <h3>List of Ambulances</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>License Plate</th>
                            <th>Model</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Assigned To</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ambulances as $ambulance)
                            <tr>
                                <td>{{ $ambulance->id }}</td>
                                <td>{{ $ambulance->license_plate }}</td>
                                <td>{{ $ambulance->model }}</td>
                                <td>{{ $ambulance->status }}</td>
                                <td>{{ $ambulance->location }}</td>
                                <td>{{ $ambulance->assigned_to ?? 'Unassigned' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">No ambulances found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="recent-activity">
                <div class="activity-title">
                    <h3>List of Patients</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->first_name }}</td>
                                <td>{{ $patient->last_name }}</td>
                                <td>{{ $patient->dob }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $patient->contact_number }}</td>
                                <td>{{ $patient->address }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">No patients found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="recent-activity">
                <div class="activity-title">
                    <h3>Recent Dispatches</h3>
                    <a href="#" class="view-all">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Ambulance</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#DIS-0025</td>
                            <td>123 Main St, City Center</td>
                            <td>Mar 18, 2025</td>
                            <td>Ambulance #03</td>
                            <td><span class="status status-active">In Progress</span></td>
                        </tr>
                        <tr>
                            <td>#DIS-0024</td>
                            <td>456 Park Ave, Highlands</td>
                            <td>Mar 17, 2025</td>
                            <td>Ambulance #07</td>
                            <td><span class="status status-complete">Complete</span></td>
                        </tr>
                        <tr>
                            <td>#DIS-0023</td>
                            <td>789 Oak Rd, Downtown</td>
                            <td>Mar 16, 2025</td>
                            <td>Ambulance #05</td>
                            <td><span class="status status-complete">Complete</span></td>
                        </tr>
                        <tr>
                            <td>#DIS-0022</td>
                            <td>321 Pine St, Westview</td>
                            <td>Mar 15, 2025</td>
                            <td>Ambulance #02</td>
                            <td><span class="status status-complete">Complete</span></td>
                        </tr>
                        <tr>
                            <td>#DIS-0021</td>
                            <td>654 Elm Blvd, Northside</td>
                            <td>Mar 15, 2025</td>
                            <td>Ambulance #06</td>
                            <td><span class="status status-pending">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</body>
</html>