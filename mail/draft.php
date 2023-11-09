<?php include "../config/config.php";
if(!isset($_SESSION['account'])){
    redirect("login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox || <?=PROJECT_NAME;?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100 font-sans">
    <?php include_once "mail_header.php";?>
    <div class="container mt-5 px-10">
        <div class="flex">
            <div class="w-3/12 text-center">
                <?php include_once "side.php" ?>

            </div>
            <div class="w-9/12">
                <!DOCTYPE html>

                <!-- Navigation bar -->
                <nav class="bg-white ml-4 border-b border-gray-300 p-4">
                    <div class="container mx-auto flex justify-between items-center">
                        <h1 class="text-2xl font-semibold">Draft (save mail)</h1>
                        <div class="space-x-4">
                            <button class="btn">Compose</button>
                            <button class="btn">Refresh</button>
                        </div>
                    </div>
                </nav>

                <!-- Mail List -->
                <div class="container ml-4  mx-auto p-4 mt-4">
                    <!-- Mail Item -->
                    <?php
                    $myUsaerId=$getUserData['user_id'];
                    $callingInbox=mysqli_query($connect, "select * from mails JOIN accounts ON mails.user_to =accounts.user_id where user_by='$myUsaerId' and isDraft='1'");
                    while($data=mysqli_fetch_array($callingInbox)):
                    ?>
                    <a href="view.php?mail_id=<?= $data['mail_id'];?>">

                        <div class="bg-white flex justify-between rounded shadow p-4 mb-4">
                            <div class="flex items-center mb-2">
                                <img src="https://via.placeholder.com/40" alt="Profile Picture"
                                    class="w-10 h-10 rounded-full">
                                <div class="ml-2">
                                    <p class="text-lg font-semibold"><?= $data['fname'];?></p>
                                    <p class="text-gray-600"><?= $data['email'];?></p>
                                    <p class="mt-2"><?= $data['subject'];?> <?= substr($data['content'],0,60);?>...</p>
                                </div>
                            </div>
                            <div class="flex">
                                <p class="text-gray-600"><?= $data['date'];?></p>
                            </div>
                        </div>
                    </a>
                    <?php endwhile; ?>
                    <!-- Repeat similar mail items for multiple emails -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>