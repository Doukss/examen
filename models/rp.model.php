<?php

function getCountAllProfesseur()
{
    $sql = "SELECT COUNT(*) nb_profs FROM professeur";
    return fetchResult($sql, [], false);
}

function getCountAllClass()
{
    $sql = "SELECT COUNT(*) nb_class FROM classe";
    return fetchResult($sql, [], false);
}

function getCountAllInscrit()
{
    $sql = "SELECT COUNT(*) nb_inscrit FROM inscription";
    return fetchResult($sql, [], false);
}