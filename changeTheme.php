<?php
echo '
  <style>
    :root {
      --bg-color: white;
      --text-color: black;
    }

    .dark-theme {
      --bg-color: black;
      --text-color: white;
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
    }
  </style>

  <script>
    let button = document.getElementById("theme-button");
        let lightTheme = "light.css";
        let darkTheme = "dark.css";

        var currTheme = lightTheme;
        var theme = "";

    button.addEventListener("click", function() {
            if (currTheme === lightTheme) {
      document.documentElement.classList.toggle("light-theme");
    } else {
              document.documentElement.classList.toggle("dark-theme");

    }

    });
  </script>

';
header("Location: index.php");

?>
<?php
// Стартуем сессию
session_start();

// Проверяем, есть ли в сессии переменная theme
if (isset($_SESSION['theme'])) {
    // Если есть, то присваиваем ее значение переменной $theme
    $theme = $_SESSION['theme'];
} else {
    // Если нет, то задаем значение по умолчанию - light
    $theme = 'light';
}

// Проверяем, была ли нажата кнопка смены темы
if (isset($_POST['change_theme'])) {
    // Если была, то меняем значение переменной $theme на противоположное
    if ($theme == 'light') {
        $theme = 'dark';
    } else {
        $theme = 'light';
    }
    // Сохраняем новое значение в сессии
    $_SESSION['theme'] = $theme;
}

// Подключаем файл стилей в зависимости от значения переменной $theme
echo "<link rel='stylesheet' type='text/css' href='$theme.css'>";
?>
