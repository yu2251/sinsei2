<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>新規ユーザ登録画面</title>
</head>
<body>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <!-- <img class="mx-auto h-5 w-auto" src="" alt=""> -->
    <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">ユーザ登録画面</h1>
  </div>
      <!-- name -->
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="sinsei_register_act.php" method="POST">
      <div>
        <label for="user_name" class="block text-sm font-medium leading-6 text-gray-900">ユーザー名</label>
        <div class="mt-2">
          <input id="user_name" name="user_name" type="text" autocomplete="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <!-- password -->
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">パスワード</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <!-- mail -->
      <div>
        <div class="flex items-center justify-between">
          <label for="user_mail" class="block text-sm font-medium leading-6 text-gray-900">メールアドレス</label>
        </div>
        <div class="mt-2">
          <input id="user_mail" name="user_mail" type="text" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <!-- date of birth -->
      <div>
        <div class="flex items-center justify-between">
          <label for="user_birthday" class="block text-sm font-medium leading-6 text-gray-900">生年月日</label>
        </div>
        <div class="mt-2">
          <input id="user_birthday" name="user_birthday" type="date" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">新規登録</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      <a href="sinsei_login.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">ログインに戻る</a>
    </p>
  </div>
</div>

</body>
</html>