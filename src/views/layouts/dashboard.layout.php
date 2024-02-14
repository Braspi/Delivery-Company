<?php
function applyClasses(string $name): void {
    echo str_contains($_SERVER['REQUEST_URI'], $name) ?
        "mb-4 h-12 pl-10 flex justify-start border-l-[7px] border-[#53c9ff] text-black" :
        "transition ease-in-out delay-0 mb-4 h-12 pl-10 flex justify-start border-[#53c9ff40] hover:text-[#3a6c81] hover:border-l-[5px] hover:border-[#53c9ff70] active:border-l-[7px] active:border-[#53c9ff] active:text-black";
}

$items = array(
    array("icon" => "users", "path" => "employees", "name" => "Kurierzy"),
    array("icon" => "folders", "path" => "departments", "name" => "Oddziały"),
    array("icon" => "file-line-chart", "path" => "status", "name" => "Status"),
    array("icon" => "car", "path" => "vehicles", "name" => "Pojazdy")
)
?>
<div class="bg-[#e7e7e7] flex">
    <div class="min-w-[300px] bg-[#F9F9F9] h-screen border text-[#6d6d6d] mt-0">
        <div class="h-28 text-black flex flex-col justify-center items-center">
            <h1 class="text-4xl">Witaj!</h1>
            <p class="text-2xl opacity-50"><?php echo $user['login'] ?></p>
        </div>
        <ul class="text-2xl">
            <?php foreach ($items as $item) { ?>
            <li class="<?php applyClasses($item['path']); ?>">
                <i data-lucide="<?php _t($item['icon']); ?>" class="mt-3 mr-2"></i>
                <button onclick="redirect('/dashboard/<?php _t($item['path']); ?>')"><?php _t($item['name']); ?></button>
            </li>
            <?php } ?>
        </ul>
        <div class="absolute bottom-0 pl-6 pb-6">
            <div class="text-gray-700">
                <p class="text-sm opacity-70 mt-1"><?php echo date('Y') ?> © Design and code - notbytes.pl</p>
            </div>
        </div>
    </div>

    <?php include $_CONTENT ?>
</div>