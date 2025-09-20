<?php require_once __DIR__ . '/partials/header.php'; ?>

<div class="container-fluid">
    <h1 class="mt-4">Admin Dashboard</h1>
    <p>Welcome to the admin panel. This is the main dashboard where platform statistics and key metrics will be displayed.</p>

    <!-- KPI cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h4><?php echo htmlspecialchars($stats['total_users']); ?></h4>
                    <p>Total Users</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h4><?php echo htmlspecialchars($stats['new_users_weekly']); ?></h4>
                    <p>New Users (Last 7 Days)</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h4><?php echo htmlspecialchars($stats['total_campaigns']); ?></h4>
                    <p>Total Campaigns</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4><?php echo htmlspecialchars($stats['completed_campaigns']); ?></h4>
                    <p>Completed Campaigns</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Feed will go here -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Real-time Activity Feed
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p>No recent activity.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
