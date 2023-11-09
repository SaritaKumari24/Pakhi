<div class="flex-1 py-8 px-10 shadow-lg flex justify-between">
    <a href="../index.php" class="flex-1"><img src="../images/logo.png" class=" w-44" alt=""></a>

    <div class="flex  justify-end gap-3 items-center flex-1">
        <a href="setting.php" class=" px-3 flex gap-2 items-center py-2 rounded">
            <?php if($getUserData['dp']): ?>
            <img src="dp/<?= $getUserData['dp'];?>" alt="Profile Picture" class="w-10 h-10 rounded-full">
            <?php else: ?>
            <img src="../images/dp_default.jpeg" alt="Profile Picture" class="w-10 h-10 rounded-full">
            <?php endif; ?>


            <span class="text-slate-600 font-semibold capitalize"><?= $getUserData['fname'];?></span>
        </a>
        <a href="../logout.php" class="text-white bg-blue-500 hover:bg-blue-700 px-3 py-2 rounded">Sign Out</a>
    </div>
</div>