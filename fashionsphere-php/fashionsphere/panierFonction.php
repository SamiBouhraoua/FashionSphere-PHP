<?php

function creationDuPanier()
{
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [
            'ID' => [],
            'Titre' => [],
            'Description' => [],
            'quantite' => [],
            'Prix' => []
        ];
    }
}

function ajouterProduitDansPanier($Titre, $Description, $ID, $quantite, $Prix)
{
    creationDuPanier();
    $position_produit = array_search($ID, $_SESSION['panier']['ID']);

    if ($position_produit !== false) {
        $_SESSION['panier']['quantite'][$position_produit] += $quantite;
    } else {
        $_SESSION['panier']['Titre'][] = $Titre;
        $_SESSION['panier']['Description'][] = $Description;
        $_SESSION['panier']['ID'][] = $ID;
        $_SESSION['panier']['quantite'][] = $quantite;
        $_SESSION['panier']['Prix'][] = $Prix;
    }
}

function montantTotal()
{
    $total = 0;
    for ($i = 0; $i < count($_SESSION['panier']['ID']); $i++) {
        $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['Prix'][$i];
    }
    return round($total, 2);
}

function retirerproduitDuPanier($id_produit_a_supprimer)
{
    $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['ID']);
    if ($position_produit !== false) {
        array_splice($_SESSION['panier']['Titre'], $position_produit, 1);
        array_splice($_SESSION['panier']['Description'], $position_produit, 1);
        array_splice($_SESSION['panier']['ID'], $position_produit, 1);
        array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
        array_splice($_SESSION['panier']['Prix'], $position_produit, 1);
    }
}

function viderPanier()
{
    if (isset($_SESSION['panier'])) {
        unset($_SESSION['panier']);
        creationDuPanier(); 
    }
}

?>
