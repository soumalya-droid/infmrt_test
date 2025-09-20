<?php

require_once 'BaseController.php';

class AdminController extends BaseController {

    public function __construct($pdo) {
        parent::__construct($pdo);
        require_login();
        require_role('admin');
    }

    public function dashboard() {
        $stats = [
            'total_users' => $this->getTotalUsers(),
            'new_users_weekly' => $this->getNewUsersWeekly(),
            'total_campaigns' => $this->getTotalCampaigns(),
            'completed_campaigns' => $this->getCompletedCampaigns()
        ];
        $this->render('admin/dashboard', ['stats' => $stats]);
    }

    private function getTotalUsers() {
        return $this->db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }

    private function getNewUsersWeekly() {
        return $this->db->query("SELECT COUNT(*) FROM users WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)")->fetchColumn();
    }

    private function getTotalCampaigns() {
        return $this->db->query("SELECT COUNT(*) FROM campaigns")->fetchColumn();
    }

    private function getCompletedCampaigns() {
        return $this->db->query("SELECT COUNT(*) FROM campaigns WHERE status = 'completed'")->fetchColumn();
    }

    public function users() {
        $stmt = $this->db->query("SELECT id, name, email, role, created_at FROM users ORDER BY id DESC");
        $users = $stmt->fetchAll();
        $this->render('admin/users/index', ['users' => $users]);
    }

    public function showUser() {
        $userId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$userId) {
            http_response_code(400);
            echo "Invalid User ID";
            return;
        }

        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();

        if (!$user) {
            http_response_code(404);
            echo "User not found";
            return;
        }

        $stmt = $this->db->prepare("SELECT * FROM profiles WHERE user_id = ?");
        $stmt->execute([$userId]);
        $profile = $stmt->fetch();

        $this->render('admin/users/show', ['user' => $user, 'profile' => $profile]);
    }

    public function updateUserStatus() {
        $userId = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status');
        $isVerified = filter_input(INPUT_POST, 'is_verified', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        if (!$userId) {
            http_response_code(400);
            echo "Invalid User ID";
            return;
        }

        // Validate status
        $allowed_statuses = ['active', 'suspended', 'banned'];
        if ($status && in_array($status, $allowed_statuses)) {
            $stmt = $this->db->prepare("UPDATE users SET status = ? WHERE id = ?");
            $stmt->execute([$status, $userId]);
        }

        // Update verification status
        if ($isVerified !== null) {
            $stmt = $this->db->prepare("UPDATE users SET is_verified = ? WHERE id = ?");
            $stmt->execute([$isVerified, $userId]);
        }

        header('Location: ' . base_url('admin/users/show?id=' . $userId));
        exit;
    }
}
