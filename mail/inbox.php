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


                <!-- Navigation bar -->
                <nav class="bg-white ml-4 border-b border-gray-300 p-4">
                    <div class="container mx-auto flex justify-between items-center">
                        <h1 class="text-2xl font-semibold">Inbox</h1>
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
                    $callingInbox=mysqli_query($connect, "select * from mails JOIN accounts ON mails.user_by =accounts.user_id where user_to='$myUserId' and isDraft='0'");
                    while($data=mysqli_fetch_array($callingInbox)):
                    ?>
                    <a href="view.php?mail_id=<?= $data['mail_id'];?>">
                        <div class="bg-white flex justify-between rounded shadow p-4 mb-4">
                            <div class="flex items-center mb-2">
                                <?php if($data['dp']): ?>
                                <img src="dp/<?= $getUserData['dp'];?>" alt="Profile Picture"
                                    class="w-10 h-10 rounded-full">
                                <?php else: ?>
                                <img src="../images/dp_default.jpeg" alt="Profile Picture"
                                    class="w-10 h-10 rounded-full">
                                <?php endif; ?>

                                <div class="ml-2">
                                    <p class="text-lg font-semibold"><?= $data['fname'];?></p>
                                    <p class="text-gray-600"><?= $data['email'];?></p>
                                    <p class="mt-2"><?= $data['subject'];?> <?= substr($data['content'],0,60);?>...</p>
                                </div>
                            </div>
                            <div class="flex gap-3 items-center">
                                <p class="text-gray-600"><?= $data['date'];?></p>
                                <?php 
                            $callingAttachment=mysqli_query($connect,"select * from attachments where mail_id='".$data['mail_id']."'");
                            $count_attachment=mysqli_num_rows($callingAttachment);
                            if($count_attachment > 0): ?>
                                <p class="text-gray-600"><img width="20" height="20"
                                        src="https://img.icons8.com/ios/50/attach.png" alt="attach" /></p>
                                <?php endif; ?>
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