<?php
session_start();
include("functions.php");
check_session_id();

$user['id'] =$_SESSION['id'];
// session_id()=$_SESSION['session_id'];
$user['user_name']=$_SESSION['user_name'];
$user['user_mail']=$_SESSION['user_mail'];

$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table LEFT OUTER JOIN zibai_application_table on users_table.id = zibai_application_table.user_id WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user['user_id'] = $_SESSION['id'];
// $_SESSION['user_name'] = $user['user_name'];
$_SESSION = array();
$_SESSION['id'] = $user['id'];
$_SESSION['session_id'] = session_id();
// $_SESSION['is_admin'] = $user['is_admin'];
$_SESSION['user_name'] = $user['user_name'];
$_SESSION['user_mail'] = $user['user_mail'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>1申請区分</title>
</head>
<body>
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">申請区分</a>
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">治療費</a>
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">通院交通費</a>
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">休業損害</a>
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">請求可能金額</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button> -->

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="img/20230501猫.JPG" alt="your_img">
                </button>
              </div>

              <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="sinsei_u_read.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="sinsei_logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">申請区分</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">治療費</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">通院交通費</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">休業損害</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">請求可能金額</a>
      </div>
      <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="img/20230501猫.JPG" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white"><?= $user["user_name"] ?></div>
            <div class="text-sm font-medium leading-none text-gray-400"><?= $user["user_mail"] ?></div>
          </div>
          <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="sinsei_u_read.php" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
          <a href="sinsei_logout.php" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $user['user_name'] ?>さん　自賠責保険申請</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
    </div>
  </main>
</div>
<!-- ↓入力部分 -->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <!-- <img class="mx-auto h-5 w-auto" src="" alt=""> -->
    <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">申請区分</h1>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="zibai_application_create.php" method="POST">
      <div>
        <div class="flex items-center justify-between">
          <tr>
          <label class="block text-sm font-medium leading-6 text-gray-900" for="higaisya_compensation">被害者請求</label>
          </tr>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <tr>
          <td class="block text-sm font-medium leading-6 text-gray-900">全て</td>
          <label class="toggle-button-001" id="higaisya_compensation">
          <input type="checkbox" name="higaisya_compensation" value="1">
          </label>
          </tr>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <tr>
          <td class="block text-sm font-medium leading-6 text-gray-900" for="higaisya_treatment_cost">治療費のみ</td>
          <label class="toggle-button-001" for="higaisya_treatment_cost">
          <input type="checkbox" name="higaisya_treatment_cost" id="higaisya_treatment_cost" value="1">
          </label>
          </tr>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <tr>
          <td class="block text-sm font-medium leading-6 text-gray-900" for="higaisya_kouisyougai">後遺障害のみ</td>
          <label class="toggle-button-001" for="higaisya_kouisyougai">
          <input type="checkbox" name="higaisya_kouisyougai" id="higaisya_kouisyougai" value="1">
          </label>
          </tr>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <tr>
          <td class="block text-sm font-medium leading-6 text-gray-900" for="higaisya_sibou">死亡</td>
          <label class="toggle-button-001" for="higaisya_sibou">
          <input type="checkbox" name="higaisya_sibou" id="higaisya_sibou" value="1">
          </label>
          </tr>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <tr>
          <label class="block text-sm font-medium leading-6 text-gray-900" for="kagaisya">加害者請求</label>
          </tr>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <tr>
          <td class="block text-sm font-medium leading-6 text-gray-900" for="kagaisya_compensation">傷害</td>
          <label class="toggle-button-001" for="kagaisya_compensation">
          <input type="checkbox" name="kagaisya_compensation" id="kagaisya_compensation" value="1">
          </label>
          </tr>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <tr>
          <td class="block text-sm font-medium leading-6 text-gray-900" for="kagaisya_sibou">死亡</td>
          <label class="toggle-button-001" for="kagaisya_sibou">
          <input type="checkbox" name="kagaisya_sibou" id="kagaisya_sibou" value="1">
          </label>
          </tr>
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">次に進む</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      <a href="sinsei_login.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">ログインに戻る</a>
    </p>
  </div>
</div>
  <script>
  </script>

</body>
</html>