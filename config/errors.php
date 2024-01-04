<?php
if (count($errors) > 0) {
    echo '<div class="alert alert-danger">';
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
    echo '</div>';
}