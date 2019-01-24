<?php
header("content-Type: text/html; charset=Utf-8");
echo stripslashes($html->head);
echo stripslashes(json_decode($html->content, 1));



//stripslashes($html->foot);
