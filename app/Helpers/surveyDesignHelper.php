<?php

function getEmoticon($value) {
    $emoticons = ['😡', '🙁', '😐', '🙂', '😍'];
    return $emoticons[$value - 1];
}

function getRatingText($value) {
    $texts = ['Tidak Puas', 'Kurang Puas', 'Cukup Puas', 'Puas', 'Sangat Puas'];
    return $texts[$value - 1];
}

function getImportanceText($value) {
    $texts = ['Tidak Penting', 'Kurang Penting', 'Cukup Penting', 'Penting', 'Sangat Penting'];
    return $texts[$value - 1];
}
