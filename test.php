<?php

include('class/user.class.php');

$blb = "florian.vf@grapflo.fr";
$resulats = User::getIdWithEmail($blb);