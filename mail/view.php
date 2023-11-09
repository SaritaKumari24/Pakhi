<?php include "../config/config.php";
if(!isset($_SESSION['account'])){
    redirect("login.php");
}
?>
<?php
                if(isset($_GET['mail_id'])){
                    $mail=$_GET['mail_id'];
                    $callingInbox=mysqli_query($connect, "select * from mails JOIN accounts ON mails.user_by =accounts.user_id where mail_id='$mail'");
                    $data=mysqli_fetch_array($callingInbox);
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
            <div class="w-9/12 ml-3">
                <nav class="bg-white  mb-4 border-b border-gray-300 p-4">
                    <div class="container mx-auto flex justify-between items-center">
                        <div class="flex gap-4 items-center">
                            <a href="inbox.php" class="btn"><img width="24" height="24"
                                    src="https://img.icons8.com/material-outlined/24/circled-left--v2.png"
                                    alt="circled-left--v2" /></a>
                            <button class="btn text-xl font-semibold">View <?= $data['fname'];?>'s mail</button>
                        </div>


                    </div>
                </nav>
                <!-- Email Header -->



                <div class="bg-white rounded-lg p-4 mb-4 shadow-md">
                    <div class="flex justify-between items-center mb-2">
                        <div class="font-semibold text-xl">Subject:><?= $data['subject'];?> </div>
                        <div class="text-gray-600 text-sm">Date: <?= $data['date'];?>AM</div>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <div class="text-gray-600 text-sm">From: ><?= $getUserData['email'];?> </div>
                        <div class="text-gray-600 text-sm">To: <?= $data['email'];?></div>
                    </div>
                </div>

                <!-- Email Content -->
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <p><?= $data['content'];?></p>

                    <!-- Add more content here -->

                    <!-- Attachment -->

                    <div class="mb-4">

                        <?php 
                            $callingAttachment=mysqli_query($connect,"select * from attachments where mail_id='".$data['mail_id']."'");
                            $count_attachment=mysqli_num_rows($callingAttachment);
                            
                   
                            if($count_attachment > 0):
                                ?>
                        <p class="text-gray-700 font-seminbold">Attachments:</p>
                        <ul class="list-disc ml-4">
                            <?php
                            while($attach=mysqli_fetch_array($callingAttachment)):
                            ?>
                            <li><a href="attach/<?= $attach['attachment'];?>"
                                    target="_blank"><?= $attach['attachment'];?></a></li>
                            <?php endwhile; endif; ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
    </div>

</body>


</html>