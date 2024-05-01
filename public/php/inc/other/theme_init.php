<?php
global $currentTheme;
if (isset($_COOKIE['selectedTheme'])) {
  $currentTheme = $_COOKIE['selectedTheme'];
} else {
  $currentTheme = 'dark_1';
}
