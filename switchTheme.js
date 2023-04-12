var btn = document.getElementById("theme-button");
var link = document.getElementById("theme-link");

btn.addEventListener("click", function () {
    switchTheme();
});

function switchTheme() {
    let lightTheme = "light.css";
    let darkTheme = "dark.css";

    var currTheme = lightTheme;
    var theme = "";

    if (currTheme === lightTheme) {
        currTheme = darkTheme;
        theme = "dark";
    } else {
        currTheme = lightTheme;
        theme = "light";
    }

    link.setAttribute("href", currTheme);
}
