@extends('master')
@section('title','Dashboard')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fc;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        .dashboard-title {
            font-size: 2rem;
            font-weight: bold;
            margin: 30px 0 20px;
            color: #0d6efd;
        }
        .chart-container {
            margin-top: 30px;
        }
    </style>
    @if(session('success'))
        <x-success-message type="success" message="{{session('success')}}" />
    @endif
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <h3>1520</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Fees Collected</h5>
                    <h3>৳1,200,000</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Fees Due</h5>
                    <h3>৳350,000</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Pending Board Dues</h5>
                    <h3>৳200,000</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row chart-container">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Fee Collection Overview</h5>
                    <canvas id="feeCollectionChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Student Enrollment by Batch</h5>
                    <canvas id="batchChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        const feeCollectionChart = new Chart(document.getElementById('feeCollectionChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Fees Collected (৳)',
                    data: [200000, 250000, 180000, 220000, 170000, 180000],
                    backgroundColor: '#0d6efd'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const batchChart = new Chart(document.getElementById('batchChart'), {
            type: 'doughnut',
            data: {
                labels: ['Spring 2025', 'Fall 2025', 'Winter 2024'],
                datasets: [{
                    label: 'Students',
                    data: [620, 530, 370],
                    backgroundColor: ['#0dcaf0', '#198754', '#ffc107']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>
@endsection
