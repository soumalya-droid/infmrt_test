
<?php
require_once __DIR__ . '/BaseController.php';
class ProfileController extends BaseController {
  public function edit() {
    require_login();
    $u = current_user();
    if ($_SERVER['REQUEST_METHOD']==='POST') {
      if (!csrf_check($_POST['csrf'] ?? '')) { http_response_code(400); return 'Bad CSRF'; }
      if ($u['role']==='company') {
        $company_name = trim($_POST['company_name'] ?? '');
        $contact_info = trim($_POST['contact_info'] ?? '');
        $bio = trim($_POST['bio'] ?? '');
        $stmt = $this->db->prepare("UPDATE profiles SET company_name=?, contact_info=?, bio=? WHERE user_id=?");
        $stmt->execute([$company_name,$contact_info,$bio,$u['id']]);
        flash('success','Profile updated');
      } else {
        $bio = trim($_POST['bio'] ?? '');
        $niche = trim($_POST['niche'] ?? '');
        $pricing = trim($_POST['pricing_range'] ?? '');
        $stmt = $this->db->prepare("UPDATE profiles SET bio=?, niche=?, pricing_range=? WHERE user_id=?");
        $stmt->execute([$bio,$niche,$pricing,$u['id']]);

        // Update social links in the users table
        $instagram_url = filter_var($_POST['instagram_url'] ?? '', FILTER_SANITIZE_URL);
        $youtube_url = filter_var($_POST['youtube_url'] ?? '', FILTER_SANITIZE_URL);
        $tiktok_url = filter_var($_POST['tiktok_url'] ?? '', FILTER_SANITIZE_URL);
        $stmt2 = $this->db->prepare("UPDATE users SET instagram_url=?, youtube_url=?, tiktok_url=? WHERE id=?");
        $stmt2->execute([$instagram_url, $youtube_url, $tiktok_url, $u['id']]);

        flash('success','Profile updated');
      }
    }
    $p = $this->db->prepare("
        SELECT p.*, u.instagram_url, u.youtube_url, u.tiktok_url
        FROM profiles p
        JOIN users u ON p.user_id = u.id
        WHERE p.user_id = ?
    ");
    $p->execute([$u['id']]);
    $profile = $p->fetch();
    return $this->view('profile/edit', compact('u','profile'));
  }
}
