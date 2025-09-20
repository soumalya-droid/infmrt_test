<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - <?php echo (require __DIR__ . '/../../../config/config.php')['app_name']; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <!-- Simple inline styles for admin layout -->
    <style>
        body { background-color: #f8f9fa; }
        .admin-nav { background-color: #343a40; padding: 0.5rem 1rem; }
        .admin-nav a { color: white; text-decoration: none; margin-right: 15px; }
        .admin-nav a:hover { color: #dddddd; }
        .content-wrapper { display: flex; }
        #sidebar { min-width: 250px; max-width: 250px; background: #343a40; color: white; transition: all 0.3s; }
        #sidebar .nav-link { color: #adb5bd; }
        #sidebar .nav-link:hover { color: #fff; }
        #content { width: 100%; padding: 20px; }
    </style>
</head>
<body>

<div class="content-wrapper">
    <nav id="sidebar">
        <div class="sidebar-header p-3">
            <h3>Admin Menu</h3>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/users'); ?>">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>" target="_blank">
                    View Main Site
                </a>
            </li>
            <li class="nav-item">
                <form action="<?php echo base_url('auth/logout'); ?>" method="POST" style="display: inline;">
                    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                    <button type="submit" class="nav-link btn btn-link" style="color: #adb5bd;">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    <main id="content">
