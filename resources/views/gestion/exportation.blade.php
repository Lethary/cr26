@extends('layouts.default')

@section('title', 'Accueil')

@section('content')
<h1>Vous pouvez ici exportez les donnée du classment en pdf,csv ou autres </h1>
<?php

$list = [
    ['aaa', 'bbb', 'ccc', 'dddd'],
    ['123', '456', '789'],
    ['"aaa"', '"bbb"']
];

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
     fputcsv($fp, $fields, ',', '"', '');
}

fclose($fp);
?>
@endsection
