<?php

function get_divider($nbr, $start=false) {
    static $divider = array();
    if ($start)
        $divider = array();

    foreach (range(2, 9) as $i) {
        if ($i      == $nbr ||
            abs($i) == $nbr ||
            $i      == 0    ||
            $i      == 1    ||
            $i      == -1    )
            {
                continue;
            }

        if ($nbr < 0)
            $i -= ($i * 2);
        $result = $nbr / $i;
        
        if (gettype($result) === "integer") {
            $nbr = $result;
            array_push($divider, $i);
            get_divider($result);
            
            break;
        }
    }

    return $divider;
}


function prime_number($nbr) {
    $divider = get_divider($nbr, true);

    if (empty($divider)) {
        echo($nbr." est premier\n");
        return true;
    }
    else {
        array_push($divider, end($divider));
        
        echo($nbr." = ");
        foreach ($divider as $key => $i) {
            echo($i." ");
            if ($key+1 < count($divider))
                echo("x ");
        }
        echo("\n");
        return false;
    }
}

?>