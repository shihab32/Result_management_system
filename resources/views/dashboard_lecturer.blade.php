<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #0f172a;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #facc15;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 18px 0;
        }

        .sidebar ul li a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 15px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            background: #1e293b;
            color: #fff;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: #fff;
            padding: 18px 25px;
            border-radius: 14px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h1 {
            font-size: 24px;
        }

        .logout-btn {
            text-decoration: none;
            background: #ef4444;
            color: #fff;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #fff;
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #334155;
        }

        .card p {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
        }

        .section {
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        .section h2 {
            margin-bottom: 15px;
            color: #0f172a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table thead {
            background: #1e3a8a;
            color: #fff;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        table tr:hover {
            background: #f8fafc;
        }

        .welcome-text {
            color: #475569;
            margin-top: 8px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                padding: 20px;
            }

            .topbar {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Lecturer Panel</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">My Courses</a></li>
            <li><a href="#">Student List</a></li>
            <li><a href="#">Attendance</a></li>
            <li><a href="#">Results</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h1>Lecturer Dashboard</h1>
                <p class="welcome-text">Welcome, {{ session('lecturer_name', 'Lecturer') }}</p>
            </div>

            <a href="{{ route('lecturer.logout') }}" class="logout-btn"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('lecturer.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Total Courses</h3>
                <p>6</p>
            </div>
            <div class="card">
                <h3>Total Students</h3>
                <p>180</p>
            </div>
            <div class="card">
                <h3>Classes Today</h3>
                <p>3</p>
            </div>
            <div class="card">
                <h3>Pending Results</h3>
                <p>12</p>
            </div>
        </div>

        <div class="section">
            <h2>Today's Class Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Time</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CSE101</td>
                        <td>Introduction to Programming</td>
                        <td>9:00 AM - 10:30 AM</td>
                        <td>Room 302</td>
                    </tr>
                    <tr>
                        <td>CSE202</td>
                        <td>Database Management System</td>
                        <td>11:00 AM - 12:30 PM</td>
                        <td>Room 205</td>
                    </tr>
                    <tr>
                        <td>CSE303</td>
                        <td>Software Engineering</td>
                        <td>2:00 PM - 3:30 PM</td>
                        <td>Room 401</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2>Recent Notices</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Notice</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>15 Apr 2026</td>
                        <td>Midterm exam marks submission deadline is next Sunday.</td>
                    </tr>
                    <tr>
                        <td>14 Apr 2026</td>
                        <td>Department meeting will be held at 3:00 PM in Conference Room.</td>
                    </tr>
                    <tr>
                        <td>13 Apr 2026</td>
                        <td>Please update attendance records before Friday.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>