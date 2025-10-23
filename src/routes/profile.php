<?php
$user = get_user();
if (!has_user()) { redirect('login'); }
$db = new Database();
$user = $db->query('SELECT email FROM user WHERE name = ?', [get_user()])[0];
render_page(['user_info'], ['title' => 'Profile', 'user' => $user]);
