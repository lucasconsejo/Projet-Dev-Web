<?php
    $folders = Documents::get_folder();
    $files = Documents::get_file();
    $documents = Documents::get_documents();
    $delete_documents = Documents::delete_documents();
    $all_user = Documents::get_all_user();
?>