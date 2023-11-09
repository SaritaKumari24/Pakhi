<?php include "../config/config.php";?>

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

    <body class="bg-gray-100 font-sans">
        <!-- Navigation bar -->
        <nav class="bg-white border-b p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-semibold">User Settings</h1>
                <a href="logout.php" class="text-blue-600 hover:underline">Logout</a>
            </div>
        </nav>

        <!-- Settings Form -->
        <div class="container mx-auto p-4 mt-4">
            <div class="flex flex-1 gap-4">
                <div class="w-3/12">
                    <div class="bg-white shadow">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-4 p-5 flex justify-center">
                                <input type="file" style="display:none;" onchange="this.form.submit()"
                                    name="profile_picture" id="profile_picture" class="p-2 border rounded-lg">
                                <label for="profile_picture" class="block text-sm font-medium text-gray-600">
                                    <?php if($getUserData['dp']): ?>
                                    <img src="dp/<?= $getUserData['dp'];?>" alt="Profile Picture"
                                        class="w-48 h-48 rounded-full">
                                    <?php else: ?>
                                    <img src="../images/dp_default.jpeg" alt="Profile Picture"
                                        class="w-48 h-48 rounded-full">
                                    <?php endif; ?>
                                    <div class="h-12">
                                        <div class="hover text-center">
                                            <p class="text-slate-600">Click to change</p>
                                        </div>
                                    </div>
                                    <h2 class="text-center font-bold text-xl">Sarita</h2>
                                </label>

                                <!-- Profile Picture -->
                            </div>
                        </form>
                        <?php
                        if(isset($_FILES['profile_picture'])){
                            $dp=$_FILES['profile_picture']['name'];
                            $tmp_dp=$_FILES['profile_picture']['tmp_name'];
                            move_uploaded_file($tmp_dp,"dp/$dp");
                            $q=mysqli_query($connect,"update accounts SET dp='$dp' where user_id='".$getUserData['user_id']."'");
                            if($q){
                                redirect("setting.php");
                            }
                        }
                        ?>
                    </div>

                </div>
                <div class="w-9/12">
                    <div class="bg-white rounded shadow p-4">
                        <form action="update_settings.php" method="post" enctype="multipart/form-data">


                            <!-- First Name -->
                            <div class="mb-4 ">
                                <label for="first_name" class="block text-sm font-medium text-gray-600">First
                                    Name</label>
                                <input type="text" name="first_name" id="first_name"
                                    class="mt-1 border p-2  w-full sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Last Name -->
                            <div class="mb-4">
                                <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name</label>
                                <input type="text" name="last_name" id="last_name"
                                    class="mt-1 border p-2 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 border p-2 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Date of Birth -->
                            <div class="mb-4">
                                <label for="dob" class="block text-sm font-medium text-gray-600">Date of Birth</label>
                                <input type="date" name="dob" id="dob"
                                    class="mt-1 border p-2 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Gender -->
                            <div class="mb-4">
                                <label for="gender" class="block text-sm font-medium text-gray-600">Gender</label>
                                <select name="gender" id="gender"
                                    class="mt-1 border p-2 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit"
                                    class="bg-blue-600 border p-2 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>




</html>