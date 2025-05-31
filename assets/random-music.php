<?php
// Bật hiển thị lỗi để kiểm tra
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Đặt tiêu đề JSON
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *'); // Cho phép gọi từ domain khác

// Danh sách bài hát
$tracks = [
    [
        "title" => "Khi yêu nào đâu ai muốn",
        "url" => "https://thhlam77.github.io/music/nhac.mp3"
    ],
];

// Kiểm tra xem danh sách bài nhạc có dữ liệu không
if (empty($tracks)) {
    // Phản hồi khi danh sách rỗng
    echo json_encode([
        "errorCode" => 1,
        "message" => "Danh sách bài nhạc trống."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Chọn bài hát ngẫu nhiên
$random_track = $tracks[array_rand($tracks)];

// Tạo phản hồi JSON
$response = [
    "errorCode" => 0, // Không có lỗi
    "titleTracks" => $random_track["title"], // Tên bài hát
    "musicUrl" => $random_track["url"], // URL nhạc
    "totalTracks" => count($tracks), // Tổng số bài hát
    "titleLength" => mb_strlen($random_track["title"], "UTF-8") // Độ dài tên bài hát
];

// Trả về dữ liệu JSON
echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>