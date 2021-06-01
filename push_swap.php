<?php

$moi = "";


function sa(array &$la)
{
    GLOBAL $moi;
    if (count($la) >= 2 && $la[0] > $la[1]) 
    {
        $PREMIER = $la[0];
        $la[0] = $la[1];
        $la[1] = $PREMIER;
        $load = implode(" - ", $la);
        echo "LA = " . $load . PHP_EOL;
        $moi .= "sa ";
        return $la;
    }
}


function sb(array &$lb)
{
    GLOBAL $moi;
    if (count($lb) >= 2 && $lb[0] > $lb[1]) 
    {
        $PREMIER = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $PREMIER;
        $load = implode(" - ", $lb);
        echo "LB = " . $load . PHP_EOL;
        $moi .= "sb ";
        return $lb;
    }
}


function sc(array &$la, array &$lb)
{
    sa($la);
    sb($lb);
}



function pa(array &$lb, array &$la) 
{
    GLOBAL $moi;
     if (count($lb) >= 1 ) 
    {
        $firstvalue = array_shift($lb);
        array_unshift($la, $firstvalue);
        $load = implode(" - ", $lb);
        echo "LB = " . $load . PHP_EOL;
        $moi .= "pa ";
        return $la;
    }   
}



function pb(array &$la, array &$lb) 
{
    GLOBAL $moi;
     if (count($la) >= 1) 
    {
        $firstvalue = array_shift($la);
        array_unshift($lb, $firstvalue);
        $load = implode(" - ", $la);
        echo "LA = " . $load . PHP_EOL;
        $moi .= "pb ";
        return $lb;
    }   
}



function ra(array &$la)
{
    GLOBAL $moi;
    if (count($la) >= 2) 
    {
        array_push($la, $la[0]);
        array_shift($la);
        $load = implode(" - ", $la);
        echo "LA = " . $load . PHP_EOL;
        $moi .= "ra ";
        return $la;
    }
}



function rb(array &$lb)
{
    GLOBAL $moi;
    if(count($lb) >= 2)
    {
        array_push($lb, $lb[0]);
        array_shift($lb);
        $load = implode(" - ", $lb);
        echo "LB = " . $load . PHP_EOL;
        $moi .= "rb ";
        return $lb;
    }
}

function rr(array &$la,array &$lb)
{
    ra($la);
    rb($lb);
}



function rra(array &$la)
{
    GLOBAL $moi;
    if(count($la) >= 2)
    {
        array_unshift($la, end($la));
        array_pop($la);
        $load = implode(" - ", $la);
        echo "LA = " . $load . PHP_EOL;
        $moi .= "rra ";
        return $la;
    }
}



function rrb(array &$lb)
{
    GLOBAL $moi;
    if(count($lb) >= 2)
    {
        array_unshift($lb, end($lb));
        array_pop($lb);
        $load = implode(" - ", $lb);
        echo "LB = " . $load . PHP_EOL;
        $moi .= "rrb ";
        return $lb;
    }
}


function rrr(array &$la, array &$lb)
{
    rra($la);
    rrb($lb);
}


function isnotsort($array) {
    $a = $array;
    $b = $array;
    sort($b);
    if ($a == $b){
        return true;
    } else {
        return false;
    }
}
function argv($argv)
{
    $la = array();
    foreach ($argv as $value) {
        array_push($la,(int) $value);
    }
    array_shift($la);
    return $la;
}



function main($argv)
{
    
    $lb = array();
    
    $la = argv($argv);
    $size = count($la);
    if(!isnotsort($la))
    {
    $i = 0;
    $o = 0;
        while ($i < $size) {
            while ($o < $size) {
                sc($la, $lb);
                pa($la, $lb);
                $o++;
            }
            while ($lb[0] != max($lb)) {
                rb($lb);
            }
            if ($lb[0] == max($lb)) {
                pb($lb, $la);
            }
        
            $i++;
        }
      }
    GLOBAL $moi;
    echo "--RESULTAT FINAL-- " . PHP_EOL;
    $load= implode(" - ", $la);
    echo "LA = " . $load . PHP_EOL;
    echo $moi . PHP_EOL;
    }

main($argv);