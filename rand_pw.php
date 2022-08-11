<?php
$password = password_hash("password", PASSWORD_ARGON2ID);
echo "$password";