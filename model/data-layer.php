<?php

/* data-layer.php
 * Return data for the dating app
 *
 */

//GET the options for interests

function getIndoor()
{
    return array("Television","Cooking", "Puzzles", "Playing Cards","Movies",
        "Board Games", "Reading","Video Games");
}

function getOutdoor()
{
    return array("Hiking","Swimming", "Collecting", "Climbing","Biking",
        "Walking");
}