<?php include "config/config.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=PROJECT_NAME;?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-slate-50">
    <?php include_once "include/header.php";?>
    <div class="container px-5">
        <div class="flex flex-1">

            <div class="w-6/12 p-5">
                <div class="bg-white p-5 shadow-lg">
                    <div class="w-full">
                        <h2 class="text-3xl font-bold my-5">Create your Pakhi Account</h2>
                    </div>
                    <form action="" method="post">
                        <div class="flex gap-3">
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label for="fname"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        First Name</label>
                                    <input type="text" id="fname" name="fname"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="First name...." required>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label for="lname"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        Last Name</label>
                                    <input type="text" id="lname" name="lname"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Last name...." required>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        email</label>
                                    <input type="email" id="email" name="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="username@pakhi.com" required>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label for="contact"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        contact</label>
                                    <input type="tel" id="contact" name="contact"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="+91 00000" required>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                        <div class="mb-4 flex-1">
                            <label for="gender"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select id="gender" name="gender"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="username@pakhi.com">
                                <option value="">Select gender here</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                of birth</label>
                            <input type="date" id="dob" name="dob"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        </div>

                        <div class="mb-6">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                password</label>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                       
                        <div class="flex justify-between">
                        <a href="login.php" class="text-blue-700 font-medium">Sign in instead</a>
                        <button type="submit" name="create"
                            class="text-white items-end bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Create an Account
                        </button>
                        </div>
                        
                    </form>
                    <?php
                    //create account work
                    if(isset($_POST['create'])){
                        $fname=$_POST['fname'];
                        $lname=$_POST['lname'];
                        $dob=$_POST['dob'];
                        $password=md5($_POST['password']);
                        $email=$_POST['email'];
                        $contact=$_POST['contact'];
                        $gender=$_POST['gender'];
                        $query=mysqli_query($connect, "insert into accounts (fname,lname,contact,email,gender,password,dob) value('$fname','$lname','$contact','$email','$gender','$password','$dob')");
                        if($query){
                            $_SESSION['account']=$email;
                            redirect('mail/inbox.php');
                        }
                        else{
                            alert('failled to create an account try again');
                            redirect('index.php');
                        }

                    }
                    ?>
                    
                </div>

            </div>
            <div class="w-6/12">

                <img src="images/pakhi.png" alt="Image description" class="object-cover w-96 mx-auto mt-7">

                <h1 class="text-center text-gray-400 text-2xl font-bold"  >welcome in <br> <?= PROJECT_NAME;?> </h1>

            </div>
        </div>
    </div>
</body>

</html>