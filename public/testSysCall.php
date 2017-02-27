<?php

$lastline = '';

$lastline = system('python /home/pi/Documents/canet/python_system_call.py', $retrival);

echo 'last Line '.$lastline;

