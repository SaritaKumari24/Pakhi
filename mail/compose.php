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
                <div class="container mx-auto p-8">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h1 class="text-2xl font-semibold mb-4">Compose Mail</h1>

                        <form action="#" enctype="multipart/form-data" method="post" class="space-y-4">
                            <div class="flex flex-col">
                                <label for="to" class="text-gray-600">To:</label>
                                <input type="text" id="to" name="user_to"
                                    class="border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                            </div>

                            <div class="flex flex-col">
                                <label for="subject" class="text-gray-600">Subject:</label>
                                <input type="text" id="subject" name="subject"
                                    class="border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                            </div>

                            <div class="flex flex-col">
                                <label for="message" class="text-gray-600">Message:</label>
                                <textarea id="message" name="content"
                                    class="border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500 h-32"></textarea>
                            </div>

                            <div class="flex flex-col">
                                <label for="attachment" class="text-gray-600">Attachment:</label>
                                <input type="file" id="attachment" name="attachment"
                                    class="py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                            </div>

                            <div class="flex gap-4 justify-end">
                                <input type="submit" name="compose" value="Send Mail"
                                    class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                                <input type="submit" name="save" value="Save to Draft"
                                    class="bg-slate-800 text-white py-2 px-4 rounded-lg hover:bg-slate-900">
                            </div>
                        </form>
                        <?php

            if(isset($_POST['compose']) || isset($_POST['save']) ){
                $user_to=$_POST['user_to'];
                $subject=$_POST['subject'];
                $content=$_POST['content'];
                $date=$_POST['date'];
                $user_by=$getUserData['user_id'];

                

                $checkUser=mysqli_query($connect,"select * from accounts where email='$user_to' and user_id !='$user_by'");
                $count_checkUser=mysqli_num_rows($checkUser);
                $getToUser=mysqli_fetch_array($checkUser);
                $getToUserId=$getToUser['user_id'];

                if($count_checkUser < 1){
                    alert("to email is not found");
                }
                else{
                    $isDraft=0;
                    if(isset($_POST['save'])){
                        $isDraft=1;
                    }
                    $composeMail=mysqli_query($connect,"insert into mails (user_to, user_by, subject,content,isDraft) value('$getToUserId','$user_by','$subject','$content','$isDraft')");
                    if($composeMail){
                        if(count($_FILES)>0):
                            //file work
                            $attachment=$_FILES['attachment']['name'];
                            $tmp_attachment=$_FILES['attachment']['tmp_name'];
                            move_uploaded_file($tmp_attachment, "attach/$attachment");
                            $currentMailId=mysqli_insert_id($connect);
                            $queryforInsertAttachment=mysqli_query($connect,"insert into attachments(attachment, mail_id) value('$attachment','$currentMailId')");
                            endif;
                        
                        alert("mail send successfully");
                        redirect("inbox.php");
                    
                    }
                    else{
                        alert("mail not send");
                        redirect("inbox.php");
                    }

                }
            }
            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>