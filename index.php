<?php
if (isset($_POST['tiktok_url'])) {
    $tiktok_url = $_POST['tiktok_url'];

    // إنشاء كائن cURL
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://tiktok-video-no-watermark2.p.rapidapi.com/comment/reply?video_id=7093219391759764782&comment_id=7093219663211053829&count=10&cursor=0",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: tiktok-video-no-watermark2.p.rapidapi.com",
            "x-rapidapi-key: YOUR TOKEN API"
        ],
    ]);

    // تنفيذ الطلب
    $response = curl_exec($curl);
    $err = curl_error($curl);

    // إغلاق الاتصال بـ cURL
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحميل فيديوهات TikTok بدون علامة مائية</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">تحميل فيديوهات TikTok بدون علامة مائية</h2>
        <form method="POST" class="text-center mt-4">
            <input type="text" name="tiktok_url" class="form-control" placeholder="أدخل رابط فيديو TikTok" required>
            <button type="submit" class="btn btn-primary mt-2">تحميل</button>
        </form>

        <?php if (isset($download_url)): ?>
            <div class="mt-4 text-center">
                <video width="320" height="240" controls>
                    <source src="<?= htmlspecialchars($download_url) ?>" type="video/mp4">
                </video>
                <br>
                <a href="<?= htmlspecialchars($download_url) ?>" class="btn btn-success mt-2" download>تحميل الفيديو</a>
            </div>
        <?php elseif (isset($error)): ?>
            <p class="text-danger mt-3"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
