<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="container-fluid">
    <h1 class="mt-4">User Profile: <?php echo htmlspecialchars($user['name']); ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    Core User Details
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
                    <p><strong>Registered:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    Profile Information
                </div>
                <div class="card-body">
                    <?php if ($profile): ?>
                        <p><strong>Bio:</strong> <?php echo nl2br(htmlspecialchars($profile['bio'])); ?></p>
                        <p><strong>Niche:</strong> <?php echo htmlspecialchars($profile['niche']); ?></p>
                        <p><strong>Pricing Range:</strong> <?php echo htmlspecialchars($profile['pricing_range']); ?></p>
                        <p><strong>Company Name:</strong> <?php echo htmlspecialchars($profile['company_name']); ?></p>
                        <p><strong>Contact Info:</strong> <?php echo htmlspecialchars($profile['contact_info']); ?></p>
                    <?php else: ?>
                        <p>This user has not created a profile yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Admin Actions
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('admin/users/update-status'); ?>" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

                <div class="form-group">
                    <label for="status">User Status (Current: <strong><?php echo htmlspecialchars($user['status']); ?></strong>)</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" <?php echo ($user['status'] === 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="suspended" <?php echo ($user['status'] === 'suspended') ? 'selected' : ''; ?>>Suspended</option>
                        <option value="banned" <?php echo ($user['status'] === 'banned') ? 'selected' : ''; ?>>Banned</option>
                    </select>
                </div>

                <div class="form-group form-check">
                    <input type="hidden" name="is_verified" value="0"> <!-- unchecked value -->
                    <input type="checkbox" class="form-check-input" id="is_verified" name="is_verified" value="1" <?php echo ($user['is_verified']) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="is_verified">
                        Is Verified? (Current: <strong><?php echo ($user['is_verified']) ? 'Yes' : 'No'; ?></strong>)
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
