<?php

$test = [1,2];

echo serialize($test);?>
<br><?php
print_r(unserialize(serialize($test)));